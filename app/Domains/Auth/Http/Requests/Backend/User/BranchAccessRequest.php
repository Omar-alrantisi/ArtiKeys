<?php

namespace App\Domains\Auth\Http\Requests\Backend\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 *
 */
class BranchAccessRequest extends FormRequest
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
     * @return array|\string[][]
     */
    public function rules(Request $request): array
    {
        switch ($request->method()) {
            case self::METHOD_POST:
                return [
                    'name' => ['required', 'max:250'],
                    'mobile_number' => ['required',Rule::unique('users')],
                    'merchant_branch_id' => ['required', 'max:250'],
                    'merchant_id' => ['required', 'max:20'],
                ];
            case self::METHOD_PATCH:
                return [
                    //'id' => ['required', 'exists:lookup_tags,id'],
                    'name' => ['required', 'max:250'],
                    'mobile_number' => ['required'],
                    'merchant_branch_id' => ['required', 'max:250'],
                    'merchant_id' => ['required', 'max:20'],
                ];
            case self::METHOD_DELETE:
            default:
                return [
                    //'id' => ['required', 'exists:lookup_tags,id']
                ];
        }
    }

    /**
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function getValidatorInstance(): \Illuminate\Contracts\Validation\Validator
    {
        $this->mobileNumberFormat();

        return parent::getValidatorInstance();
    }

    /**
     * @return void
     */
    protected function mobileNumberFormat()
    {
        $this->request->set('mobile_number',(int)$this->request->get('mobile_number'));
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

