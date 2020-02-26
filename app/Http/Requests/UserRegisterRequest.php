<?php

namespace App\Http\Requests;

use App\Rules\Alpha;
use App\Rules\CheckNotExistUser;
use App\Rules\PatternPhoneNumber;
use Facades\App\Models\SharedModel;
use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            if(SharedModel::check_number_persian($this->input('phone_number'))) {
                $this['phone_number'] = SharedModel::convert2english($this->input('phone_number'));
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
            'first_name'       => ['bail', 'required', 'min:3',   'max:50',  'alpha',],
            'last_name'        => ['bail', 'required', 'min:3',   'max:100', 'alpha'],
            'phone_number'     => ['bail', 'required', 'min:10',  'max:13',   new PatternPhoneNumber, new CheckNotExistUser],
            'email'            => ['bail', 'nullable', 'min:8',   'max:320', 'email' ],
            'password'         => ['bail', 'required', 'min:4',   'max:50',],
            'password_confirm' => ['bail', 'required', 'min:4',   'max:50', 'same:password'],
        ];
    }
}
