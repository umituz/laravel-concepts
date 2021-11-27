<?php

namespace App\Http\Controllers;


use App\Mail\ResetPasswordMail;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ResetPasswordController
 * @package App\Http\Controllers
 */
class ResetPasswordController extends Controller
{
    /**
     * Send email password reset
     *
     * @return array
     */
    public function sendEmail()
    {
        $email = request('email');
        if (!$this->validateEmail($email)) {
            return $this->failedResponse();
        }
        $this->send($email);
        return $this->successResponse();
    }

    /**
     * Sends email
     *
     * @param $email
     */
    public function send($email)
    {
        $token = $this->createToken($email);
        Mail::to($email)->send(new ResetPasswordMail($token));
    }

    /**
     * Returns a new  token
     *
     * @param $email
     * @return mixed
     */
    public function createToken($email)
    {
        $oldToken = DB::table('password_resets')->where('email', $email)->first();

        if ($oldToken) {
            return $oldToken->token;
        }

        $token = Str::random(60);
        $this->saveToken($token, $email);
        return $token;
    }

    /**
     * Saves a token to our database
     *
     * @param $token
     * @param $email
     * @return bool
     */
    public function saveToken($token, $email)
    {
        return DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
    }

    /**
     * Returns response when successfully send email
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function successResponse()
    {
        return response()->json([
            'data' => 'Reset Email is send successfully, please check your inbox.'
        ], Response::HTTP_OK);
    }

    /**
     * Returns true if email in out database
     *
     * @param $email
     * @return bool
     */
    public function validateEmail($email)
    {
        return !!User::where('email', $email)->first();
    }

    /**
     * Returns response when failed
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function failedResponse()
    {
        return response()->json([
            'error' => 'Email does\'t found on our database'
        ], Response::HTTP_NOT_FOUND);
    }
}
