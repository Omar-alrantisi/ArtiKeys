<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class AdultDateOfBirth implements Rule
{
    public function passes($attribute, $value)
    {
        // Check if the provided value is a valid date
        if (!strtotime($value)) {
            return false;
        }

        // Calculate the user's age based on the provided date of birth
        $dob = Carbon::parse($value);
        $age = $dob->age;

        // Check if the user is at least 18 years old
        return $age >= 18;
    }

    public function message()
    {
        return 'The :attribute must be at least 18 years ago.';
    }
}
