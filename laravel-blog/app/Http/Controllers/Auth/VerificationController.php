<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\AuthTrait;
use Illuminate\Foundation\Auth\VerifiesEmails;

/**
 * Class VerificationController
 * @package App\Http\Controllers\Auth
 */
class VerificationController extends Controller
{
    use VerifiesEmails, AuthTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
