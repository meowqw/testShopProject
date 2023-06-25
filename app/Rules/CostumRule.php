<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CostumRule implements Rule
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
        return preg_match('/\b([0-9]|[a-z])\b/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Строка должна быть либо числом (0-9) либо буквой в нижнем регистре';
    }
}
