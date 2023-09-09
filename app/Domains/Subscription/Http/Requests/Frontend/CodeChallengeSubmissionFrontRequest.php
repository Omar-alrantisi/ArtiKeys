<?php
namespace App\Domains\Subscription\Http\Requests\Frontend;

use App\Services\StorageManagerService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CodeChallengeSubmissionFrontRequest extends FormRequest
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
            'css_certificate' => ['required'],
            'html_certificate' => ['required'],
            'js_certificate' => ['required'],
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
