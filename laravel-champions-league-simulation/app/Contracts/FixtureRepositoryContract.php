<?php

namespace App\Contracts;

interface FixtureRepositoryContract
{
    public function getAll();

    public function truncate();

    public function insert($fixtures);

    public function setWeekFixture($weekNumber, $clubs, $fixture);

    public function setRevenge($fixture, $weekCount);

    public function nonPlayedWeeks();

    public function weeklyFixture($week);

    public function updateFixture($fixture, $result);

}
