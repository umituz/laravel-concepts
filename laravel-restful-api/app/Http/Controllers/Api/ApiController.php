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
 *
 * @OA\Server(
 *     description="Laravel API Test Server",
 *     url="http://127.0.0.1:8000/api"
 * )
 *
 * @OA\Server(
 *     description="Laravel API Production Server",
 *     url="http://app.127.0.0.1:8000/api"
 * )
 *
 * @OA\ExternalDocumentation(
 *     description="Find out more about Laravel API",
 *     url="http://127.0.0.1:8000/external-documentation"
 * )
 *
 * @OA\Schema(
 *     title="ApiResponse",
 *     description="ApiResponse model",
 *     type="object",
 *     schema="ApiResponse",
 *     properties={
            @OA\Property(property="success", type="boolean"),
            @OA\Property(property="data", type="object"),
            @OA\Property(property="message", type="string"),
            @OA\Property(property="errors", type="object"),
 *     },
 * )
 *
 * @OA\Tag(
 *     name="products",
 *     description="You can manage your products here",
 *     @OA\ExternalDocumentation(
 *          description="Find out more",
 *          url="http://127.0.0.1:8000/api/documentation/product"
 *     )
 *
 * )
 *
 * @OA\SecurityScheme(
 *     type="apiKey",
 *     name="api_token",
 *     securityScheme="api_token",
 *     in="query"
 * )
 *
 * @OA\SecurityScheme(
 *     type="http",
 *     securityScheme="bearer_token",
 *     scheme="bearer",
 *     bearerFormat="JWT"
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
