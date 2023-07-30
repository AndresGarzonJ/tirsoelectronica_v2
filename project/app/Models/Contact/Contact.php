<?php

namespace App\Models\Contact;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contact';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'cover',
        'name_proprietary',
        'name_enterprise',
        'name_headquarter',
        'description',
        'address',
        'e_mail',
        'telephone_number_1',
        'telephone_number_2',
        'telephone_number_3',
        'profile_facebook',
        'profile_twitter',
        'profile_youtube',
        'profile_mercadolibre',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
