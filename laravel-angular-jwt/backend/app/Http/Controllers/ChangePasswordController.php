<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\User;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ChangePasswordController
 * @package App\Http\Controllers
 */
class ChangePasswordController extends Controller
{
    /**
     * Process of changing password
     *
     * @param ChangePasswordRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function process(ChangePasswordRequest $request)
    {
        return $this->getPasswordResetTableRow($request)->count() > 0 ? $this->changePassword($request) : $this->tokenNotFoundResponse();
    }

    /**
     * Returns the row of the user's token
     *
     * @param $request
     * @return mixed
     */
    private function getPasswordResetTableRow($request)
    {
        return DB::table('password_resets')->where(['email' => $request->email, 'token' => $request->resetToken]);
    }

    /**
     * Returns json response when token not found in our database
     *
     * @return \Illuminate\Http\JsonResponse
     */
    private function tokenNotFoundResponse()
    {
        return response()->json(['error' => 'Token or Email is incorrect'], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * Changes password
     *
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    private function changePassword($request)
    {
        $user = User::whereEmail($request->email)->first();
        $user->update(['password'=>$request->password]);
        $this->getPasswordResetTableRow($request)->delete();
        return response()->json(['data'=>'Password Successfully Changed'],Response::HTTP_CREATED);
    }

}
