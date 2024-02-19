<?php
namespace App\Domains\Subscription\Http\Requests\Frontend;

use App\Rules\AdultDateOfBirth;
use App\Services\StorageManagerService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubscriptionFrontRequest extends FormRequest
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
            'country_id' => ['required'],
            'dob' => ['required', 'date', new AdultDateOfBirth],
            'first_name_en' => ['required'],
            'second_name_en' => ['required'],
            'third_name_en' => ['required'],
            'last_name_en' => ['required'],
            'first_name_ar' => ['required'],
            'second_name_ar' => ['required'],
            'third_name_ar' => ['required'],
            'last_name_ar' => ['required'],
            'country_name' => ['nullable'],
            'gender' => ['required'],
            'marital_status' => ['required'],
            'identification_card' => ['nullable', 'mimes:' . implode(',', StorageManagerService::$allowedImages)],
            'vaccination_certificate' => ['nullable', 'mimes:' . implode(',', StorageManagerService::$allowedImages)],
            'personal_image' => ['required', 'mimes:' . implode(',', StorageManagerService::$allowedImages)],
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
