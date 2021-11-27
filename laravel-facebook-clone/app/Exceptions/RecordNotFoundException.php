<?php

namespace App\Exceptions;

use Exception;

/**
 * Class RecordNotFoundException
 * @package App\Exceptions
 */
class RecordNotFoundException extends Exception
{
    /**
     * Render the exception as an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response()->json([
            'errors' => [
                'code' => 404,
                'title' => 'Record Not Found',
                'detail' => 'Unable to locate the record with the given information'
            ]
        ], 404);
    }
}
