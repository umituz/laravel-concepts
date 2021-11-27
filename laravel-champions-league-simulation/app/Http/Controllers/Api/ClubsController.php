<?php

namespace App\Http\Controllers\Api;

use App\Contracts\ClubRepositoryContract;
use App\Http\Controllers\Controller;
use App\Http\Resources\Club\ClubCollection;

/**
 * Class ClubsController
 * @package App\Http\Controllers\Api
 */
class ClubsController extends Controller
{
    /**
     * @var ClubRepositoryContract
     */
    private $clubRepository;

    /**
     * @param ClubRepositoryContract $clubRepository
     */
    public function __construct(ClubRepositoryContract $clubRepository)
    {
        $this->clubRepository = $clubRepository;
    }

    /**
     * Veritabanından tüm verileri aldıktan sonra, collection & resource yapısına uygun
     * geriye verileri json olarak döner.
     *
     * @return ClubCollection
     */
    public function index()
    {
        $clubs = $this->clubRepository->getAll();
        return new ClubCollection($clubs);
    }
}
