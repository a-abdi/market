<?php

namespace App\Http\Requests;

use App\Rules\AuthUserLogin;
use App\Rules\PatternPhoneNumber;
use Illuminate\Foundation\Http\FormRequest;
use Facades\App\Repositories\SharedRepository;

class UserLoginRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        if($this->filled('phone_number')) {
            if(SharedRepository::check_number_persian($this->input('phone_number'))) {
                $this['phone_number'] = SharedRepository::convert2english($this->input('phone_number'));
            }
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone_number'     => ['bail', 'required',  new PatternPhoneNumber,],
            'password'         => ['bail', 'required', 'max:50',  new AuthUserLogin($this->input('phone_number'))],
        ];
    }
}
