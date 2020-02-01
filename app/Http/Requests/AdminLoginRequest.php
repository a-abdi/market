<?php

namespace App\Http\Requests;

use App\Rules\MatchUserAdmin;
use App\Rules\MatchPasswordAdmin;
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
            'name' => ['bail', 'required', 'min:4', 'max:255', new MatchUserAdmin],
            'password' => ['bail', 'required', 'min:4', 'max:255', new MatchPasswordAdmin],
        ];
    }
}
