<?php

namespace App\Rules;

use App\Models\Services;
use Illuminate\Contracts\Validation\Rule;

class weightLimit implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Services::where('service_type', 'pickup And Delivery')->where('weight_limit' , '>=' , $value)->count() != 0;
    }
    

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Too heavy! This weight is more than allowed';
    }
}
