<?php

namespace App\Models\Contact;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{   
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contact';

    protected $fillable = [
        'cover',
        'name_proprietary',  
        'name_enterprise',
        'description', 
        'address',
        'e_mail',
        'telephone_number_1',
        'telephone_number_2',
        'telephone_number_3',
        'profile_youtube',
        'profile_twitter',
        'profile_mercadolibre',
        'profile_facebook',
             
    ];
    protected $hidden = []; 
}
  