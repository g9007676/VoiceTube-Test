<?php

namespace App\Traits;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

/**
 * Created by PhpStorm.
 * User: Zheyu
 * Date: 2018/8/17
 * Time: 下午12:14
 */
trait TailedValidation
{
    public function failedValidation(Validator $validator)
    {
        $error = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(
            ['status' => 'error', 'data' => $error],
            Response::HTTP_BAD_REQUEST
        ));
    }
}