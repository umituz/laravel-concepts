<?php

namespace App\Http\Controllers;

use App\Models\Multipic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    public function index()
    {
        $brands = DB::table('brands')->get();
        $abouts = DB::table('home_abouts')->first();
        $images = Multipic::all();
        return view('about', compact('brands','abouts','images'));
    }
}
