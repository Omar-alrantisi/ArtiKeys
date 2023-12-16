<?php

namespace App\Domains\Lookups\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * Class TestRequest.
 */
class TestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request): array
    {

        switch ($request->method()){
            case self::METHOD_POST:
                return [
                    'question' => ['required', 'max:255'],
                    'category' => ['required', 'max:255'],
                    'first_choice' => ['required', 'max:255'],
                    'second_choice' => ['required', 'max:255'],
                    'third_choice' => ['required', 'max:255'],
                    'fourth_choice' => ['required', 'max:255'],
                    'correct_answer' => ['required', Rule::in(['first_choice', 'second_choice', 'third_choice', 'fourth_choice'])],
                    'weight' => ['required', 'numeric'],
                    'status' => ['required', 'boolean'],
                ];
            case self::METHOD_PATCH:
                return [
                    'id' => ['required', 'exists:tests,id'],
                    'question' => ['required', 'max:255'],
                    'category' => ['required', 'max:255'],
                    'first_choice' => ['required', 'max:255'],
                    'second_choice' => ['required', 'max:255'],
                    'third_choice' => ['required', 'max:255'],
                    'fourth_choice' => ['required', 'max:255'],
                    'correct_answer' => ['required', Rule::in(['first_choice', 'second_choice', 'third_choice', 'fourth_choice'])],
                    'weight' => ['required', 'numeric'],
                    'status' => ['required', 'boolean'],
                ];
            case self::METHOD_DELETE:
            default:
                return [
                    'id' => ['required', 'exists:tests,id']
                ];
        }
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            // You can add custom error messages if needed.
        ];
    }
}
