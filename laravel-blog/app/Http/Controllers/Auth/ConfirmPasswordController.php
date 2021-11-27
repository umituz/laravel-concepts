<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\AuthTrait;
use Illuminate\Foundation\Auth\ConfirmsPasswords;

/**
 * Class ConfirmPasswordController
 * @package App\Http\Controllers\Auth
 */
class ConfirmPasswordController extends Controller
{
    use ConfirmsPasswords, AuthTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
}
