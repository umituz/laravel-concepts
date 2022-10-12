<?php

namespace App\Repositories;

use App\User;
use DB;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository implements UserRepositoryInterface
{
    private User $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param $id
     * @return array
     */
    public function getUserById($id): array
    {
        return DB::select("CALL get_user_by_id($id)");
    }
}
