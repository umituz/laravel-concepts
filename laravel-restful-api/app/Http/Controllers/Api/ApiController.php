<?php

namespace App\Http\Controllers\Api;

use App\Enumerations\ApiEnumeration;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

/**
 * Class ApiController
 * @package App\Http\Controllers\Api
 */
class ApiController extends Controller
{
    /**
     * Returns api response
     *
     * @param $data
     * @param null $message
     * @param int $code
     * @param int $status
     * @return JsonResponse
     */
    public function apiResponse($data, $message = null, int $code = 200, int $status = ApiEnumeration::SUCCESS): JsonResponse
    {
        $response = array();

        $response['success'] = $status == ApiEnumeration::SUCCESS;

        if (isset($message)) {
            $response['message'] = $message;
        }

        if (isset($data)) {

            if ($status != ApiEnumeration::ERROR) {
                $response['data'] = $data;
            }

            if ($status == ApiEnumeration::ERROR) {
                $response['errors'] = $data;
            }
        }

        return response()->json($response, $code);
    }
}
