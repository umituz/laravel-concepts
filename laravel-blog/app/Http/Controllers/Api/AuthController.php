<?php

namespace App\Http\Controllers\Api;

use App\Enumerations\RoleEnumeration;
use App\Enumerations\TokenEnumeration;
use App\Helpers\AuthHelper;
use App\Helpers\ConfigHelper;
use App\Helpers\DateHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

/**
 * Class AuthController
 * @package App\Http\Controllers\Api
 */
class AuthController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = AuthHelper::user();
            $token = $user->createToken(ConfigHelper::getAppName());
            $data['token_type'] = TokenEnumeration::TYPE;
            $data['expires_at'] = DateHelper::isoFormat($token->token->expires_at);
            $data['user_id'] = $user->id;
            $data['email'] = $user->email;
            $data['name'] = $user->name;
            $data['token'] = $token->accessToken;
            return response()->json($data);
        } else {
            return response()->json(__('Email or password is incrorrect'), 401);
        }
    }

    /**
     * @param Request $request
     * @return array|JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        if ($user->save()) {
            $user->assignRole(RoleEnumeration::DEFAULT_ROLE);
            $data['user_id'] = $user->id;
            $data['name'] = $user->name;
            $data['email'] = $user->email;
            $data['roles'] = $user->getRoleNames();
            return $data;
        } else {
            return response()->json(__('Something Went Wrong. Please, try again later!'), 400);
        }
    }
}
