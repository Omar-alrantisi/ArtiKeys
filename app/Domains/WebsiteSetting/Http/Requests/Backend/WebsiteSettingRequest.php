<?php

namespace App\Domains\WebsiteSetting\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * Class WebsiteSettingRequest.
 */
class WebsiteSettingRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @param Request $request
     * @return \string[][]
     */
    public function rules(Request $request): array
    {
        switch ($request->method()) {
            case self::METHOD_PATCH:
                return [
                    'id' => ['required', 'exists:website_settings,id'],
                    'logo' => ['nullable'],
                    'favicon' => ['nullable'],
                    'main_color' => ['nullable', 'max:2550'],
                ];
        }
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

