<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\FixtureService;

/**
 * Class FixturesController
 * @package App\Http\Controllers\Api
 */
class FixturesController extends Controller
{
    /**
     * @var FixtureService
     */
    private $fixtureService;

    /**
     * @param FixtureService $fixtureService
     */
    public function __construct(FixtureService $fixtureService)
    {
        $this->fixtureService = $fixtureService;
    }

    /**
     * Gruplanmış olarak gelen verileri döndürür
     *
     * @return mixed
     */
    public function index()
    {
        return $this->fixtureService->getGroupedFixtures();
    }
}
