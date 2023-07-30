<?php

namespace App\Models\Contact\Repositories\Interfaces;

use Andresgarzonj\Baserepo\BaseRepositoryInterface;
use App\Models\Contact\Contact;
use Illuminate\Http\UploadedFile;
// use Illuminate\Support\Collection;

interface ContactRepositoryInterface extends BaseRepositoryInterface
{
    public function updateContact(array $data) : bool;

    public function findContactById(int $id) : Contact;

    public function deleteFile(array $file, $disk = null) : bool;
    
    public function deleteCover() : bool;

    // public function deleteThumb(string $src) : bool;

    // public function findContactImages() : Collection;

    public function saveCoverImage(UploadedFile $file) : string;

    // public function saveContactImages(Collection $collection);
}
