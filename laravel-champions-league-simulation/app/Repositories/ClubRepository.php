<?php

namespace App\Repositories;

use App\Contracts\ClubRepositoryContract;
use App\Enumerations\ClubEnumeration;
use App\Models\Club;
use App\Traits\TruncateTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ClubRepository
 * @package App\Repositories
 */
class ClubRepository implements ClubRepositoryContract
{
    use TruncateTrait;

    /**
     * @var Club
     */
    private $club;

    /**
     * @param Club $club
     */
    public function __construct(Club $club)
    {
        $this->club = $club;
    }

    /**
     * Puanı en yüksekten en küçüğe şekilde sıralanmış bir şekilde
     * veritabanındaki kulüplerin tamamını döndürür
     *
     * @return mixed
     */
    public function getAll()
    {
        return $this->club->orderByDesc('point')->get();
    }

    /**
     * Belirtilen adetçe veritabanına sahte veri ekler.
     *
     * @return Collection|Model
     */
    public function createClubsWithFactory()
    {
        return $this->club->factory()->count(ClubEnumeration::TOTAL_CLUB)->create();
    }

    /**
     * Veritabanındaki ilgili tabloyu(clubs) boşaltır.
     * Tabloyu boşaltmadan önce foreign key zorunluluğunu pasif hale getirir
     * Tablo boş olduktan sonra foreign key zorunluluğunu aktif hale getirir
     *
     * @return bool
     */
    public function truncate()
    {
        $this->disableForeignKeys();
        $this->club->truncate();
        $this->enableForeignKeys();
        return true;
    }

    /**
     * Parametre olarak gönderilen kulübün, ilgili sütunlarını günceller.
     *
     * @param $club
     * @param $scoreAndPoint
     */
    public function updateClubFixture($club, $scoreAndPoint)
    {
        $club->update([
            'scored_goal' => $club->scored_goal + $scoreAndPoint['scored_goal'],
            'conceded_goal' => $club->conceded_goal + $scoreAndPoint['conceded_goal'],
            'point' => $club->point + $scoreAndPoint['point'],
        ]);
    }

}
