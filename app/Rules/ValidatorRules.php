<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidatorAwareRule;

class ValidatorRules implements Rule,DataAwareRule,ValidatorAwareRule
{
    private  $data;
    private  $validator;
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

    public function setData( $data):ValidatorRules
    {
        $this->data = $data;
        return $this;
    }

    public function setValidator( $validator):ValidatorRules

    {
        $this->validator = $validator;
        return $this;
    }

    public function passes($attribute, $value)
    {
        if($this->data['username']== $value)
        {}
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "The :attribute cannot same with password.";
    }
}
