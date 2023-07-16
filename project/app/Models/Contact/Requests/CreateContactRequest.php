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
            'description'  => ['required'],
            'cover' => ['required', 'file', 'image:png,jpeg,jpg,gif'],
            'address'  => ['required'],
            'e_mail' => ['required'],
            'telephone_number_1' => ['required']
        ];
    }
}