<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\View\View;

/**
 * Class ForgotPasswordController
 * @package App\Http\Controllers\Auth
 */
class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * Display the form to request a password reset link.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View|View
     */
    public function showLinkRequestForm()
    {
        return view('frontend.auth.passwords.email');
    }
}
