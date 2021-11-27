<?php

namespace App\Exceptions;

use App\Enumerations\ApiEnumeration;
use App\Http\Controllers\Api\ApiController;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param Exception $exception
     * @return void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param Exception $exception
     * @return Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof ModelNotFoundException) {
            return (new ApiController)->apiResponse(null,
                str_replace("App\\", '', $exception->getModel()) . __(' Not Found'),
                JsonResponse::HTTP_NOT_FOUND,
                ApiEnumeration::ERROR);
        } else if ($exception instanceof NotFoundHttpException) {
            return (new ApiController)->apiResponse(null,
                __('No Pages Found'),
                JsonResponse::HTTP_NOT_FOUND,
                ApiEnumeration::ERROR);
        }

        return parent::render($request, $exception);
    }
}
