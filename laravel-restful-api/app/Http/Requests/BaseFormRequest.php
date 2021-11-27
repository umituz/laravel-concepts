<?php

namespace App\Http\Requests;

use App\Enumerations\ApiEnumeration;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class BaseFormRequest extends FormRequest
{
    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     * @return void
     *
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            (new ApiController)->apiResponse($errors, __('Please, validate the form'), JsonResponse::HTTP_UNPROCESSABLE_ENTITY, ApiEnumeration::ERROR)
        );

    }
}
