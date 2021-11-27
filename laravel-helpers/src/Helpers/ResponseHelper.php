<?php

namespace LaravelHelper\Helpers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class ResponseHelper
 * @package App\Helpers
 */
class ResponseHelper
{
    /**
     * @return JsonResponse|object
     */
    public static function notFound()
    {
        return response()->json([
            'code' => 404,
            'message' => __('Not found!')
        ])->setStatusCode(404);
    }

    /**
     * @return Application|ResponseFactory|Response
     */
    public static function noContent()
    {
        return response("", 204);
    }

    /**
     * @param $validator
     * @return JsonResponse|object
     */
    public static function validatorFails($validator)
    {
        return response()->json([
            'code' => 422,
            'message' => $validator->errors()->all()
        ])->setStatusCode(422);
    }
}
