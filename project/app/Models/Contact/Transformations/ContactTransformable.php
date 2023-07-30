<?php

namespace App\Models\Contact\Transformations;

use App\Models\Contact\Contact;

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
        $cont = new Contact;
        $cont->id = (int) $contact->id;
        $cont->name_proprietary = $contact->name_proprietary;
        $cont->cover = $this->rewriteExitsImagePathContact($contact->cover);
        $cont->name_enterprise = $contact->name_enterprise;
        $cont->name_headquarter = $contact->name_headquarter;
        $cont->description = $contact->description;
        $cont->address = $contact->address;
        $cont->e_mail = $contact->e_mail;
        $cont->telephone_number_1 = $contact->telephone_number_1;
        $cont->telephone_number_2 = $contact->telephone_number_2;
        $cont->telephone_number_3 = $contact->telephone_number_3;
        $cont->profile_facebook = $contact->profile_facebook;
        $cont->profile_twitter = $contact->profile_twitter;
        $cont->profile_youtube = $contact->profile_youtube;
        $cont->profile_mercadolibre = $contact->profile_mercadolibre;
        return $cont;
    }

    /**
     * it checks the image path which registered to DB and it exists whether on storage. 
     * if exist, return original path add asset. 
     * if not exist, return path for No Data.png
     * 
     * @param string $path
     * @return string $existsPath
     */
    private function rewriteExitsImagePathContact($path)
    {
        if ($path == null) {
            return $path;
        }
        // if (file_exists("/var/www/storage/app/public/" . $path)) {
        if (file_exists("D:/tirsoelectronica_v2/project/storage/app/public/" . $path)) {
            return asset("storage/$path");
        }
        return asset("images/NoData.png");
    }
}
