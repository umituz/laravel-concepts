<?php

namespace App\Services;

use App\Contracts\FixtureRepositoryContract;
use App\Http\Resources\Fixture\FixtureResource;

/**
 * Class FixtureService
 * @package App\Services
 */
class FixtureService
{
    /**
     * @var FixtureRepositoryContract
     */
    private $fixtureRepository;

    /**
     * @param FixtureRepositoryContract $fixtureRepository
     */
    public function __construct(FixtureRepositoryContract $fixtureRepository)
    {
        $this->fixtureRepository = $fixtureRepository;
    }

    /**
     * Veritabanından gelen tüm fikstür verilerini gruplayarak geriye döndürür
     *
     * @return mixed
     */
    public function getGroupedFixtures()
    {
        $fixtures = $this->fixtureRepository->getAll();
        return $this->getGroupedResource($fixtures);
    }

    /**
     * Parametre olarak gönderilen fikstür verilerini resource yapısını kullanarak hazırlar
     * Hazırlanan yeni verileri gruplayarak geri döndürür
     *
     * @param $fixtures
     * @return mixed
     */
    public function getGroupedResource($fixtures)
    {
        $fixtures = FixtureResource::collection($fixtures);
        return $fixtures->groupBy('week');
    }

    /**
     * Fikstür otomatik olarak oluşturur.
     * Oluşan fikstürü veritabanında ilgili tabloya kaydeder
     * Kaydedilen verileri resource yapısı kullanılarak geriye gruplayarak döndürür
     *
     * @param $clubs
     * @return mixed
     */
    public function generateFixtures($clubs)
    {
        $this->fixtureRepository->truncate();
        $fixture = collect();
        $weekCount = FormulaService::setTotalWeek($clubs);

        foreach (range(1, $weekCount) as $weekNumber) {
            $fixture = $fixture->merge($this->fixtureRepository->setWeekFixture($weekNumber, $clubs, $fixture));
        }

        $data = $this->fixtureRepository->setRevenge($fixture->toArray(), $weekCount);

        $this->fixtureRepository->insert($data);

        return $this->getGroupedResource($data);
    }

}
