<?php

namespace App\Http\Requests\Api\v1;

use App\Rules\dimensionsLimit;
use App\Rules\weightLimit;
use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
            "weight"            => ['required','integer','min:1', new weightLimit],
            "height"            => ['required','integer','min:1', new dimensionsLimit],
            "width"             => ['required','integer','min:1', new dimensionsLimit],
            "length"            => ['required','integer','min:1', new dimensionsLimit],
            "Description"       => 'sometimes|string',
            "service_type"      => 'required|string',

            "country_to"        => 'required',
            "province_to"       => 'required',
            "city_to"           => 'required',
            "line_1_to"         => 'required',
            "line_2_to"         => 'sometimes',
            "postal_code_to"    => 'required',
            "name_to"           => 'required|string',
            "phone_to"          => 'sometimes|nullable|string',
            "email_to"          => 'sometimes|nullable|email',
            "attention_to"      => 'sometimes|nullable|string',
            "instruction_to"    => 'sometimes|nullable|string',
            "trans_type_to"     => 'sometimes|nullable|string',

            "country_from"      => 'required',
            "province_from"     => 'required',
            "city_from"         => 'required',
            "line_1_from"       => 'required',
            "line_2_from"       => 'sometimes',
            "name_from"         => 'required',
            "postal_code_from"  => 'required',
            "phone_from"        => 'required|string',
            "email_from"        => 'sometimes|nullable|email',
            "attention_from"    => 'sometimes|nullable|string',
            "instruction_from"  => 'sometimes|nullable|string',
            "trans_type_from"   => 'sometimes|nullable|string',
        ];
    }
}