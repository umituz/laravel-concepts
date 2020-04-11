<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class ProfileController
 * @package App\Http\Controllers\User
 */
class ProfileController extends Controller
{

    public function upload()
    {
        request('image')->store('images','public');
    }
}
