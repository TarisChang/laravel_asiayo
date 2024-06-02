<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ExchageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'source' => ['required', 'alpha'],
            'target' => ['required', 'alpha'],
            'amount' => ['required', 'regex:/^(\d+|\d{1,3}(,\d{3})*)(\.\d+)?$/'],
        ];
    }

    // public function messages(): array
    // {
    //     return [
    //         'source.string' => '必須為字串',
    //         'target.string' => '必須為字串',
    //         'amount.regex' => '格式錯誤',
    //     ];
    // }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'msg'   => "fail",
            'data'  => $validator->errors()
        ]));
    }
}
