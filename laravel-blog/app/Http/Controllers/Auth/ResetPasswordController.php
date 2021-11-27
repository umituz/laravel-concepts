<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\AuthTrait;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class ResetPasswordController
 * @package App\Http\Controllers\Auth
 */
class ResetPasswordController extends Controller
{
    use ResetsPasswords, AuthTrait;

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function showResetForm(Request $request)
    {
        $token = $request->route()->parameter('token');

        return view('frontend.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
