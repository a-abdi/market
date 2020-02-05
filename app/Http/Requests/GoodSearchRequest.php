<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodSearchRequest extends FormRequest
{

    protected $validation;
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
        $type = $this->input('type');

        switch ($type) {
            case "name":
                $this->validation = ['bail', 'required', 'alpha_num'];
                break;
            case "price":
                $this->validation = ['bail', 'required', 'numeric'];
                break;
            case "id":
                $this->validation = ['bail', 'required', 'numeric'];
                break;
            case "user_id":
                $this->validation = ['bail', 'required', 'numeric'];
                break;
            case "created_at":
                $this->validation = ['bail', 'required', 'date'];
                break;
            default:
                abort(404);
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
            'value' => $this->validation
        ];
    }
}
