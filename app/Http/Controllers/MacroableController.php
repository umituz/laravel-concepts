<?php

namespace App\Http\Controllers;

use App\Helpers\MacroHelper;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

/**
 * Class MacroableController
 * @package App\Http\Controllers
 */
class MacroableController extends Controller
{
    public function partNumber()
    {
        dd(Str::partNumber(123456789));
    }

    public function prefix()
    {
        dd(Str::prefix('hey!'));
    }

    public function errorJson()
    {
        dd(Response::errorJson("Heeey!"));
    }

    public function ourMacro()
    {
        return MacroHelper::success();
    }
}
