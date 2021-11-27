<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\MatchService;

/**
 * Class MatchesController
 * @package App\Http\Controllers\Api
 */
class MatchesController extends Controller
{
    /**
     * @var MatchService
     */
    private $matchService;

    /**
     * @param MatchService $matchService
     */
    public function __construct(MatchService $matchService)
    {
        $this->matchService = $matchService;
    }

    /**
     * Sezondaki tüm oynanmamış maçları oynatır
     *
     * @return bool
     */
    public function matchesAll()
    {
        return $this->matchService->playAll();
    }
}
