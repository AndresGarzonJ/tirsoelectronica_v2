<?php

namespace App\Models\Contact\Repositories\Interfaces;

use Andresgarzonj\Baserepo\BaseRepositoryInterface;
use App\Models\Contact\Contact;
use Illuminate\Http\UploadedFile;

interface ContactRepositoryInterface extends BaseRepositoryInterface
{
    public function createContact(array $data): Contact;

    public function updateContact(array $data) : bool;

    public function findContactById(int $id) : Contact;

    public function deleteFile(array $file, $disk = null) : bool;
    
    public function deleteCover() : bool;

    public function saveCoverImage(UploadedFile $file) : string;

}
