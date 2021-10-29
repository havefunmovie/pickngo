<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;

class DriverRequest extends FormRequest
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
            "name"      => 'required|string',
            "family"    => 'required|string',
            "email"     => 'required|unique:users,email,'.$this->driver.'|email',
            "mobile"    => 'sometimes|nullable|string',
            "gender"    => 'sometimes|nullable|string',
            "address"   => 'sometimes|nullable|string',
            "postal"    => 'sometimes|nullable|min:6',
            "city"      => 'sometimes|nullable',
            "province"  => 'sometimes|nullable',
            "password"  => 'sometimes|string|min:6',
            "status"    => 'sometimes|string',
        ];
    }
}
