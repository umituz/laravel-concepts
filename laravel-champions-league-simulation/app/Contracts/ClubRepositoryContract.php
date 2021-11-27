<?php

namespace App\Contracts;

interface ClubRepositoryContract
{
    public function getAll();

    public function createClubsWithFactory();

    public function truncate();

    public function updateClubFixture($club, $scoreAndPoint);

}
