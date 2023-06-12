<?php

namespace App\Models\Shop\OrderStatuses\Requests;

use App\Models\Shop\Base\BaseFormRequest;

class CreateOrderStatusRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'unique:order_statuses']
        ];
    }
}
