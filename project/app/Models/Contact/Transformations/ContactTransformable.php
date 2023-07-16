<?php

namespace App\Models\Contact\Transformations;

use App\Models\Contact\Contact;
use Illuminate\Support\Facades\Storage;
 
trait ContactTransformable
{ 
    /**
     * Transform the contact
     *
     * @param Contact $contact
     * @return Contact
     */
    protected function transformContact(Contact $contact)
    {
        $file = Storage::disk('public')->exists($contact->cover) ? $contact->cover : null;

        $contc = new Contact;
        $contc->id = (int) $contact->id;
        $contc->name_proprietary = $contact->name_proprietary;
        $contc->cover = $file;
        $contc->name_enterprise = $contact->name_enterprise;
        $contc->description = $contact->description;
        $contc->address = $contact->address;
        $contc->e_mail = $contact->e_mail;
        $contc->telephone_number_1 = $contact->telephone_number_1;
        $contc->telephone_number_2 = $contact->telephone_number_2;
        $contc->telephone_number_3 = $contact->telephone_number_3;
        $contc->profile_facebook = $contact->profile_facebook;
        $contc->profile_twitter = $contact->profile_twitter;
        $contc->profile_youtube = $contact->profile_youtube;
        $contc->profile_mercadolibre = $contact->profile_mercadolibre;


        return $contc;
    }
}