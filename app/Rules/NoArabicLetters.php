<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NoArabicLetters implements Rule
{
    public function passes($attribute, $value)
    {
        $pattern = '/\p{Arabic}/u';
        return !preg_match($pattern, $value);
    }

    public function message()
    {
        return 'The :attribute field cannot contain Arabic letters.';
    }
}
