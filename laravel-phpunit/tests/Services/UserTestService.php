<?php

namespace Tests\Services;

use App\Contracts\UserRepositoryContract;
use App\Models\User;
use App\Repositories\UserRepository;
use Tests\Enumerations\UserTestEnumeration;

class UserTestService
{
    /**
     * @var UserRepositoryContract
     */
    private $userRepository;

    public function __construct(UserRepositoryContract $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public static function getUserRepository()
    {
        return new UserRepository(new User());
    }

    public static function createUser($data = [])
    {
        if(!array_key_exists('password',$data)){
            $data = array_merge($data, [
                'password' => bcrypt(UserTestEnumeration::CORRECT_PASSWORD)
            ]);
        }
        return User::factory()->create($data);
    }
}
