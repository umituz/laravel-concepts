<?php

namespace App\Contracts;

interface UserRepositoryContract
{
    public function getAll();

    public function createWithFactory();
}
