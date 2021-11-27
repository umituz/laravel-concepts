<?php

namespace App\Http\Controllers\Api;

use App\Enumerations\ApiEnumeration;
use App\Http\Controllers\Controller;

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
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiResponse($data, $message = null, $code = 200, $status = ApiEnumeration::SUCCESS)
    {
        $response = array();

        $response['success'] = $status == ApiEnumeration::SUCCESS ? true : false;

        if (isset($message) && !is_null($message)) {
            $response['message'] = $message;
        }

        if (isset($data) && !is_null($data)) {

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
