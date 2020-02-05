<?php

namespace App\Http\Requests;

use App\Rules\AuthAdmin;
use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => ['bail', 'required', 'min:4', 'max:60'],
            'password' => ['bail', 'required', 'min:4', 'max:60', new AuthAdmin($this->input('name'))],
        ];
    }
}
