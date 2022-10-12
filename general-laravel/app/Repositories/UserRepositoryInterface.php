<?php

namespace App\Repositories;

/**
 * Interface UserRepositoryInterface
 * @package App\Repositories
 */
interface UserRepositoryInterface
{
    /**
     * @param $id
     * @return array
     */
    public function getUserById($id): array;
}
