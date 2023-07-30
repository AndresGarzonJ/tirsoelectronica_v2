<?php

namespace App\Models\Contact\Requests;

use App\Models\Shop\Base\BaseFormRequest;
use Illuminate\Validation\Rule;

class UpdateContactRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_proprietary' => ['required'],
            'name_enterprise' => ['required'],
            'name_headquarter' => ['required'],
            'address' => ['required'],
            // 'image' => 'array',
            'cover' => 'image|max:2048',
        ];
    }
}
