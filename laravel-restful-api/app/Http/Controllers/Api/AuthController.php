<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

/**
 * Class AuthController
 * @package App\Http\Controllers\Api
 */
class AuthController extends Controller
{
    public function login()
    {
        $validator = Validator::make(request()->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->messages()
            ]);
        }

        $user = User::where('email', request('email'))->first();

        if ($user) {

            if (Hash::check(request('password'), $user->password)) {

                $newToken = Str::random(60);

                $user->update([
                    'api_token' => $newToken
                ]);

                return response()->json([
                    'full_name' => $user->first_name . ' ' . $user->last_name,
                    'access_token' => $newToken,
                    'time' => time()
                ]);

            }

            return response()->json([
                'message' => 'Invalid Password'
            ]);

        }

        return response()->json([
            'message' => 'User Not Found'
        ]);
    }
}
