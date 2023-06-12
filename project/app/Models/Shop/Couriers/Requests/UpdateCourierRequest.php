<?php

namespace App\Models\Shop\Couriers\Requests;

use App\Models\Shop\Base\BaseFormRequest;
use Illuminate\Validation\Rule;

class UpdateCourierRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('couriers')->ignore($this->segment(3))]
        ];
    }
}
