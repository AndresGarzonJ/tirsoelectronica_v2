<?php

namespace App\Models\Contact\Requests;

use App\Models\Shop\Base\BaseFormRequest;

class CreateContactRequest extends BaseFormRequest
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
            'name_headquarter' => ['required', 'unique:contact'],
            'address' => ['required', 'unique:contact'],
            'cover' => ['required', 'file', 'image:png,jpeg,jpg,gif']
        ];
    }
}
