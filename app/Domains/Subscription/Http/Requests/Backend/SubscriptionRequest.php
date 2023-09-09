<?php

namespace App\Domains\Subscription\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Services\StorageManagerService;

class SubscriptionRequest extends FormRequest
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
    public function rules(Request $request): array
    {
        switch ($request->method()){
            case self::METHOD_PATCH:
                return [
                    'id' => ['required', 'exists:subscriptions,id'],
                    'name' => ['required'],
                    'business_email' => ['required'],
                    'business_phone_number' => ['required'],
                    'logo' => ['nullable', 'mimes:' . implode(',', StorageManagerService::$allowedImages)],
                    'business_type_id',
                    'product_id'=>['nullable']
                ];
            case self::METHOD_DELETE:
            default:
                return [
                    'id' => ['required', 'exists:subscriptions,id']
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
