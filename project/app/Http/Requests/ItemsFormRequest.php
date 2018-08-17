<?php

namespace App\Http\Requests;

use App\Traits\TailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class ItemsFormRequest extends FormRequest
{
    use TailedValidation;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string'
        ];
    }
}
