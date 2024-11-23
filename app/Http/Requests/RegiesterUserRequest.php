<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class RegiesterUserRequest extends FormRequest
{
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "username"=>['required','max:100'],
            "password"=>['required','max:100'],
            "name"=>['required','max:20']
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        // throw new HttpResponseException([
        //     "errors"=>$validator->getMessageBag()
        // ],400);

       // noted:karena versi 9 harus dibungkus response json
        throw new HttpResponseException(
            response()->json(["errors"=>$validator->getMessageBag()])
            
        ,500);
    }
}
