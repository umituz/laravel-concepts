<?php

namespace App\Services;

use App\Contracts\ClubRepositoryContract;
use App\Http\Resources\Club\ClubResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class FormulaService
 * @package App\Services
 */
class ClubService
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
     * Veritabanındaki ilgili tabloyu(clubs) boşalttıktan sonra
     * factory ile beraber yeni verileri oluşturup veritabanına kaydeder
     * Resource yapısını kullanarak geriye hazırlanmış türde verileri döndürür
     *
     * @return AnonymousResourceCollection
     */
    public function generateClubs()
    {
        $this->clubRepository->truncate();
        $clubs = $this->clubRepository->createClubsWithFactory();
        return ClubResource::collection($clubs);
    }
}
