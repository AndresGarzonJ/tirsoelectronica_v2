<?php

namespace App\Models\Shop\Carts\Requests;

use App\Models\Shop\Base\BaseFormRequest;

class AddToCartRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product' => ['required', 'integer'],
            'quantity' => ['required', 'integer', 'min:1']
        ];
    }
}
