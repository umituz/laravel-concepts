<?php

namespace App\Http\Controllers\Api;

use App\Enumerations\ApiEnumeration;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

/**
 * Class ApiController
 * @package App\Http\Controllers\Api
 *
 * @OA\Info(
 *      version="1.0.0",
 *      title="Laravel API Documentation",
 *      description="Laravel API Description",
 *      termsOfService="http://127.0.0.1:8000/terms-of-service",
 *      @OA\Contact(email="umituz998@gmail.com"),
 *      @OA\License(name="Apache 2.0", url="https://www.apache.org/licenses/LICENSE-2.0.html")
 * )
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
