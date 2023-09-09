<?php
namespace App\Domains\Subscription\Http\Requests\Frontend;

use App\Services\StorageManagerService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PersonalQuestionFrontRequest extends FormRequest
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
     * Get the validation rules that apply to request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'user_benefit' => ['required'],
            'user_after_5_years' => ['required'],
            'use_web_skills' => ['required'],
            'successful_developer' => ['required'],
            'developer_do' => ['required'],
            'user_interest_join' => ['required'],
            'about_user' => ['required'],
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
        ];
    }

}
