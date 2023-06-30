<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Latitude implements Rule
{
    public function passes($attribute, $value)
    {
        // Regular expression to validate latitude (-90 to +90)
        return preg_match('/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/', $value);
    }

    public function message()
    {
        return 'The :attribute must be a valid latitude value.';
    }
}
