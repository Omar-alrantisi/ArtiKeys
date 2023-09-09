<?php

namespace App\Domains\Auth\Http\Requests\Frontend\Auth;

use App\Rules\NoArabicLetters;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;

class UserRequest extends FormRequest
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
    public function rules()
    {
//        dd('sdfsdfsdf');
        return [
//            'name' => ['required', 'max:100'],
            'email' => ['required', 'max:255', 'email', Rule::unique('users'),new NoArabicLetters('The :attribute field cannot contain Arabic letters.')],
            'phone_number' =>['required'],
//            'country_code' =>['required'],
            'password' => [
                'max:100',
                'min:6',
                PasswordRules::register($this->email),
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
            ]
        ];
    }

}
