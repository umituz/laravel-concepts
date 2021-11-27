<?php

namespace App\Repositories;

use App\Contracts\FixtureRepositoryContract;
use App\Models\Club;
use App\Models\Fixture;
use App\Services\FormulaService;
use App\Traits\TruncateTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class FixtureRepository
 * @package App\Http\Controllers\Api
 */
class FixtureRepository implements FixtureRepositoryContract
{
    use TruncateTrait;

    /**
     * @var Fixture
     */
    private $fixture;

    /**
     * @var Club
     */
    private $clubs;

    /**
     * @var Fixture
     */
    private $leagueFixture;

    /**
     * @param Fixture $fixture
     */
    public function __construct(Fixture $fixture)
    {
        $this->fixture = $fixture;
    }

    /**
     * Veritabanında ilgili tablodaki(fixtures) tüm kayıtları, ilişkili olduğu
     * yapılarla beraber geriye döndürür
     * @return Builder[]|Collection
     */
    public function getAll()
    {
        return $this->fixture->with('homeClub', 'awayClub')->get();
    }

    /**
     * Veritabanındaki ilgili tabloyu(fixtures) boşaltır.
     * Tabloyu boşaltmadan önce foreign key zorunluluğunu pasif hale getirir
     * Tablo boş olduktan sonra foreign key zorunluluğunu aktif hale getirir
     * @return bool
     */
    public function truncate()
    {
        $this->disableForeignKeys();
        $this->fixture->truncate();
        $this->enableForeignKeys();
        return true;
    }

    /**
     * İlgili tabloya(fixtures) çoklu bir şekilde verileri kaydeder
     *
     * @param $fixtures
     * @return mixed
     */
    public function insert($fixtures)
    {
        return $this->fixture->insert($fixtures);
    }

    /**
     * Haftalık fikstür eşleştirmelerini belirler
     *
     * @param $weekNumber
     * @param $clubs
     * @param $fixture
     * @return \Illuminate\Support\Collection
     */
    public function setWeekFixture($weekNumber, $clubs, $fixture)
    {
        $this->clubs = $clubs;
        $this->leagueFixture = $fixture;
        $weeklyMatchCount = FormulaService::setWeeklyMatchCount($clubs);
        $weekFixture = collect();

        for ($i = 1; $i <= $weeklyMatchCount; $i++) {
            $homeClub = $this->selectHomeClub($weekFixture);
            $awayClub = $this->selectAwayClub($weekFixture, $homeClub);
            $weekFixture->push([
                'home_club_id' => $homeClub->id,
                'away_club_id' => $awayClub->id,
                'home_club_goal' => 0,
                'away_club_goal' => 0,
                'week' => $weekNumber,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return $weekFixture;
    }

    /**
     * Oynanan maçlarının rövanşını belirler
     *
     * @param $fixture
     * @param $weekCount
     * @return array
     */
    public function setRevenge($fixture, $weekCount)
    {
        $revenge = [];
        foreach ($fixture as $match) {
            $revenge[] = [
                'home_club_id' => $match['away_club_id'],
                'away_club_id' => $match['home_club_id'],
                'week' => $match['week'] + $weekCount,
                'home_club_goal' => $match['home_club_goal'],
                'away_club_goal' => $match['away_club_goal'],
                'created_at' => $match['created_at'],
                'updated_at' => $match['updated_at'],
            ];
        }

        return array_merge($fixture, $revenge);
    }

    /**
     * Henüz oynanmamış maçları geriye döndürür
     *
     * @return array
     */
    public function nonPlayedWeeks()
    {
        return array_unique($this->fixture->whereNull('result')->pluck('week')->all());
    }

    /**
     * Haftalık fikstürü geriye döndürür
     *
     * @param $week
     * @return mixed
     */
    public function weeklyFixture($week)
    {
        return $this->fixture->where('week', $week)->with(['homeClub', 'awayClub'])->get();
    }

    /**
     * Fikstürü ilgili sonuçla günceller
     *
     * @param $fixture
     * @param $result
     * @return mixed
     */
    public function updateFixture($fixture, $result)
    {
        return $fixture->update($result);
    }


    /**************************** PRIVATE METHODS ***********************************************/

    /**
     * Maç eşleşirken ev sahibi takımı belirler
     *
     * @param $weekFixture
     * @return mixed
     */
    private function selectHomeClub($weekFixture)
    {
        return $this->clubs->whereNotIn('id', $this->activeWeekMatchClubIds($weekFixture))->random();
    }

    /**
     * Maç eşleşirken deplasman takımını belirler
     *
     * @param $weekFixture
     * @param $club
     * @return mixed
     */
    private function selectAwayClub($weekFixture, $club)
    {
        return $this->clubs->whereNotIn('id', $this->notAvailableClubIds($weekFixture, $club))->random();
    }

    /**
     * Maç eşleştirme esnasında göz ardı edilmesi gereken maçları belirler
     *
     * @param $weekFixture
     * @param $club
     * @return array
     */
    private function notAvailableClubIds($weekFixture, $club)
    {
        return array_merge(
            [$club->id],
            $this->previousMatchClubIds($club),
            $this->activeWeekMatchClubIds($weekFixture)
        );
    }

    /**
     * Maçları eşleştirilmiş olan takımları geriye döndürür
     *
     * @param $weekFixture
     * @return array
     */
    private function activeWeekMatchClubIds($weekFixture)
    {
        return array_merge(
            $weekFixture->pluck('away_club_id')->all(),
            $weekFixture->pluck('home_club_id')->all()
        );
    }

    /**
     * Daha önce eşleşmiş olan takımları belirler
     *
     * @param $club
     * @return array
     */
    private function previousMatchClubIds($club)
    {
        return array_merge(
            $this->leagueFixture->where('home_club_id', $club->id)->pluck('away_club_id')->all(),
            $this->leagueFixture->where('away_club_id', $club->id)->pluck('home_club_id')->all()
        );
    }
}
