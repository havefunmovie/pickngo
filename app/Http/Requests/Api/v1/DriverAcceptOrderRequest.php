<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;

class DriverAcceptOrderRequest extends FormRequest
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
        $date = date('Y-m-d', strtotime(' +2 day'));   
        return [
            "order_id"      => 'required|integer',
            "pickup_time"   => 'required|date_format:Y-m-d H:i:s|after_or_equal:today|before:'.$date.'',
            "deliver_time"  => 'required|date_format:Y-m-d H:i:s|after_or_equal:pickup_time|before:'.$date.'',
            "accepted_at"   => 'required|date_format:Y-m-d H:i:s|after_or_equal:today',
        ];
    }
}
