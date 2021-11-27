<?php

namespace App\Helpers;

/**
 * Class CalculateHelper
 * @package App\Helpers
 */
class CalculateHelper
{
    /**
     * Bu kısımda destek alınmıştır.
     *
     * @param $votes
     * @param $totalVoteCount
     * @return float
     */
    public static function postVotingResult($votes, $totalVoteCount)
    {
        $percent30 = round($totalVoteCount * 0.3);
        $percent70 = $totalVoteCount - $percent30;
        $moreEffectiveVotesTotal = $votes->take($percent30)->pluck('vote')->sum() * 2;
        $lessEffectiveVotesTotal = $votes->take($percent70 * -1)->pluck('vote')->sum();
        $total = ($moreEffectiveVotesTotal + $lessEffectiveVotesTotal) / ($totalVoteCount + $percent30);
        return round($total, 1);
    }
}
