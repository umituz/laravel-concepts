<?php

namespace App\Services;

use App\Contracts\ClubRepositoryContract;
use App\Contracts\FixtureRepositoryContract;
use App\Enumerations\MatchEnumeration;
use App\Models\Fixture;

/**
 * Class FormulaService
 * @package App\Services
 */
class MatchService
{
    /**
     * @var FixtureRepositoryContract
     */
    private $fixtureRepository;

    /**
     * @var ClubRepositoryContract
     */
    private $clubRepository;

    /**
     * @param FixtureRepositoryContract $fixtureRepository
     * @param ClubRepositoryContract $clubRepository
     */
    public function __construct(FixtureRepositoryContract $fixtureRepository, ClubRepositoryContract $clubRepository)
    {
        $this->fixtureRepository = $fixtureRepository;
        $this->clubRepository = $clubRepository;
    }

    /**
     * Sezon içindeki tüm oynanmamış maçları oynar.
     *
     * @return bool
     */
    public function playAll()
    {
        foreach ($this->fixtureRepository->nonPlayedWeeks() as $weekNumber) {

            $weeklyMatches = $this->fixtureRepository->weeklyFixture($weekNumber);

            foreach ($weeklyMatches as $match) {
                $result = $this->foundResult($match);

                $scoreAndPoint = $this->generateScoreAndPoints($result);

                $this->fixtureRepository->updateFixture($match, [
                    'home_club_goal' => $scoreAndPoint['home']['scored_goal'],
                    'away_club_goal' => $scoreAndPoint['away']['scored_goal'],
                    'result' => $result,
                ]);

                $this->clubRepository->updateClubFixture($match->homeClub, $scoreAndPoint['home']);
                $this->clubRepository->updateClubFixture($match->awayClub, $scoreAndPoint['away']);

            }
        }
        return true;
    }

    /**
     * Maç sonucunu geriye döndürür
     *
     * @param $match
     * @return string
     */
    public function foundResult($match)
    {
        $homeClubCapability = $match->homeClub->capability;
        $awayClubCapability = $match->awayClub->capability;

        $drawPoint = FormulaService::calculateDrawPoint([
            $homeClubCapability,
            $awayClubCapability
        ]);

        $totalPoint = FormulaService::calculateTotalPoint(
            $drawPoint,
            $homeClubCapability,
            $awayClubCapability
        );

        $randomNumber = rand(1, $totalPoint);

        if ($randomNumber < $homeClubCapability) {
            return 'home';
        } else if ($randomNumber < $homeClubCapability + $drawPoint) {
            return 'draw';
        } else {
            return 'away';
        }
    }


    /**
     * Maç esnasındaki golleri ve puanı belirler
     *
     * @param $result
     * @return array[]|void
     */
    public function generateScoreAndPoints($result)
    {
        $maxGoal = MatchEnumeration::MAX_GOAL;
        $minGoal = MatchEnumeration::MIN_GOAL;
        $winScore = MatchEnumeration::WIN_SCORE;
        $drawScore = MatchEnumeration::DRAW_SCORE;
        $loseScore = MatchEnumeration::LOSE_SCORE;
        switch ($result) {
            case 'home':
                $homeClubGoal = rand(1, $maxGoal);
                $awayClubGoal = rand($minGoal, ($homeClubGoal - 1));
                return [
                    'home' => ['scored_goal' => $homeClubGoal, 'conceded_goal' => $awayClubGoal, 'point' => $winScore],
                    'away' => ['scored_goal' => $awayClubGoal, 'conceded_goal' => $homeClubGoal, 'point' => $loseScore],
                ];
            case 'draw':
                $drawGoal = rand($minGoal, $maxGoal);
                return [
                    'home' => ['scored_goal' => $drawGoal, 'conceded_goal' => $drawGoal, 'point' => $drawScore],
                    'away' => ['scored_goal' => $drawGoal, 'conceded_goal' => $drawGoal, 'point' => $drawScore],
                ];
            case 'away':
                $awayClubGoal = rand(1, $maxGoal);
                $homeClubGoal = rand($minGoal, ($awayClubGoal - 1));
                return [
                    'home' => ['scored_goal' => $homeClubGoal, 'conceded_goal' => $awayClubGoal, 'point' => $loseScore],
                    'away' => ['scored_goal' => $awayClubGoal, 'conceded_goal' => $homeClubGoal, 'point' => $winScore],
                ];
            default:
                return [];
        }
    }
}
