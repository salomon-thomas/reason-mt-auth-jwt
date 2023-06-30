<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Longitude implements Rule
{
    public function passes($attribute, $value)
    {
        // Regular expression to validate longitude (-180 to +180)
        return preg_match('/^[-]?(([-+]?([0-9]{1,2})((\.[0-9]+)?)|(1[0-7][0-9])((\.[0-9]+)?)|(180)((\.[0]+)?)))$/', $value);
    }

    public function message()
    {
        return 'The :attribute must be a valid longitude value.';
    }
}
