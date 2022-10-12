<?php

namespace App\Http\Controllers;

use App\Http\Resources\User\UserResource;
use App\Repositories\UserRepositoryInterface;

/**
 * Class StoredProceduresController
 * @package App\Http\Controllers
 */
class StoredProceduresController extends Controller
{
    private UserRepositoryInterface $userRepository;

    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param int $id
     * @return UserResource
     */
    public function getUserById(int $id): UserResource
    {
        $user = $this->userRepository->getUserById($id);

        return new UserResource($user);
    }
}
