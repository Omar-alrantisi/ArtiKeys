<?php
namespace App\Domains\Subscription\Http\Requests\Frontend;

use App\Services\StorageManagerService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubscriptionInfoFrontRequest extends FormRequest
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
            'city_id' => ['required'],
            'field_of_study' => ['required'],
            'education_level' => ['required'],
            'educational_status' => ['required'],
            'education_background' => ['required'],
            'arabic_writing' => ['required'],
            'arabic_specking' => ['required'],
            'english_writing' => ['required'],
            'english_specking' => ['required'],
            'hear_about' => ['required'],
            'r_f_n_1' => ['required'],
            'r_f_n_2' => ['required'],
            'r_r_1' => ['required'],
            'r_r_2' => ['required'],
            'r_m_n_1' => ['required'],
            'r_m_n_2' => ['required'],
            'full_address' => ['required'],


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
