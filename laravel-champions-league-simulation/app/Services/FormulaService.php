<?php

namespace App\Services;

/**
 * Class FormulaService
 * @package App\Services
 */
class FormulaService
{
    /**
     * Sezon içindeki toplam haftayı belirler
     *
     * @param $clubs
     * @return int
     */
    public static function setTotalWeek($clubs)
    {
        return $clubs->count() - 1;
    }

    /**
     * Sezon içindeki haftalık kaç maç oynanacağını belirler
     *
     * @param $clubs
     * @return float|int
     */
    public static function setWeeklyMatchCount($clubs)
    {
        return $clubs->count() / 2;
    }

    /**
     * Berabere kalma olasılığını hesaplar
     *
     * @param $capability
     * @return float|int
     */
    public static function calculateDrawPoint($capability)
    {
        sort($capability);
        return $capability[0] * 100 / $capability[1];
    }

    /**
     * İlgili parametreler doğrultusunda toplam olasılığı belirler
     *
     * @param $drawPoint
     * @param $homeClubCapability
     * @param $awayClubCapability
     * @return mixed
     */
    public static function calculateTotalPoint($drawPoint,$homeClubCapability,$awayClubCapability)
    {
        return $drawPoint + $homeClubCapability + $awayClubCapability;
    }
}
