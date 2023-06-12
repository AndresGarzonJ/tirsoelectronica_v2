<?php

namespace App\Models\Shop\Carts\Requests;

use App\Models\Shop\Base\BaseFormRequest;

/**
 * Class CartCheckoutRequest
 * @package App\Models\Shop\Cart\Requests
 * @codeCoverageIgnore
 */
class CartCheckoutRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'billing_address' => ['required']
        ];
    }
}
