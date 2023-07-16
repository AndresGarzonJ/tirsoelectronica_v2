<?php

namespace App\Models\Shop\Brands\Requests;

use App\Models\Shop\Base\BaseFormRequest;

class CreateBrandRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'unique:brands']
        ];
    }
}