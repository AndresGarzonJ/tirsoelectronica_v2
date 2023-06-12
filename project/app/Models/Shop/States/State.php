<?php

namespace App\Models\Shop\States;

use App\Models\Shop\Countries\Country;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public $fillable = [
        'state',
        'state_code'
    ];

    public $timestamps = false;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}