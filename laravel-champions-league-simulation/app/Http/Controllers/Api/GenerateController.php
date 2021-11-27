<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ClubService;
use App\Services\FixtureService;

/**
 * Class GenerateController
 * @package App\Http\Controllers\Api
 */
class GenerateController extends Controller
{
    /**
     * @var ClubService
     */
    private $clubService;

    /**
     * @var FixtureService
     */
    private $fixtureService;

    /**
     * @param ClubService $clubService
     * @param FixtureService $fixtureService
     */
    public function __construct(ClubService $clubService, FixtureService $fixtureService)
    {
        $this->clubService = $clubService;
        $this->fixtureService = $fixtureService;
    }

    /**
     * Yeni sezon için hazırlanmış, yeni takım ve onların fikstürünü geriye döndürür
     *
     * @return array
     */
    public function index()
    {
        $clubs = $this->clubService->generateClubs();
        $fixtures = $this->fixtureService->generateFixtures($clubs);
        return [
            'clubs' => $clubs,
            'fixtures' => $fixtures
        ];
    }
}
