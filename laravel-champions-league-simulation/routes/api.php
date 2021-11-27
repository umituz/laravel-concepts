<?php

use App\Http\Controllers\Api\ClubsController;
use App\Http\Controllers\Api\FixturesController;
use App\Http\Controllers\Api\GenerateController;
use App\Http\Controllers\Api\MatchesController;
use Illuminate\Support\Facades\Route;

Route::get('/clubs', [ClubsController::class, 'index'])->name('clubs');
Route::get('/fixtures', [FixturesController::class, 'index'])->name('fixtures');
Route::post('/generate', [GenerateController::class, 'index'])->name('generate');
Route::post('/matches/all', [MatchesController::class, 'matchesAll'])->name('matches.all');
