<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;

class AdminSetPickupAndDeliveryPriceRequest extends FormRequest
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
            "id"                        => 'sometimes|integer',
            "service_percentage"        => 'sometimes|nullable|string',
            "service_price"             => 'sometimes|nullable|string',
            "urgent_price"              => 'sometimes|nullable|string',
            "driver_percentage"         => 'sometimes|nullable|string',

            "weight_limit"              => 'sometimes|nullable|string',
            "weight_minimum"            => 'sometimes|nullable|string',
            "weight_extra"              => 'sometimes|nullable|string',
            "weight_extra_price"        => 'sometimes|nullable|string',

            "dimensions_limit"          => 'sometimes|nullable|string',
            "dimensions_minimum"        => 'sometimes|nullable|string',
            "dimensions_extra"          => 'sometimes|nullable|string',
            "dimensions_extra_price"    => 'sometimes|nullable|string',

            "distance_limit"            => 'sometimes|nullable|string',
            "distance_minimum"          => 'sometimes|nullable|string',
            "distance_extra"            => 'sometimes|nullable|string',
            "distance_extra_price"      => 'sometimes|nullable|string',
        ];
    }
}
