<?php

namespace App\Models\Contact\Repositories;

// use App\Models\Contact\Exceptions\ContactCreateErrorException;
use App\Models\Contact\Exceptions\ContactUpdateErrorException;
use Andresgarzonj\Baserepo\BaseRepository;
use App\Models\Contact\Exceptions\ContactNotFoundException;
use App\Models\Contact\Contact;
use App\Models\Contact\Repositories\Interfaces\ContactRepositoryInterface;
use App\Models\Contact\Transformations\ContactTransformable;
use App\Models\Shop\Tools\UploadableTraitContact;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;
// use Illuminate\Support\Collection;
// use Illuminate\Support\Facades\DB;

class ContactRepository extends BaseRepository implements ContactRepositoryInterface
{
    use ContactTransformable, UploadableTraitContact;

    /**
     * ContactRepository constructor.
     * @param Contact $contact
     */
    public function __construct(Contact $contact)
    {
        parent::__construct($contact);
        $this->model = $contact;
    }

    /**
     * Update the contact
     *
     * @param array $data
     *
     * @return bool
     * @throws ContactUpdateErrorException
     */
    public function updateContact(array $data) : bool
    {
        $filtered = collect($data)->all();

        try {
            return $this->model->where('id', $this->model->id)->update($filtered);
        } catch (QueryException $e) {
            throw new ContactUpdateErrorException($e);
        }
    }

    /**
     * Find the contact by ID
     *
     * @param int $id
     *
     * @return Contact
     * @throws ContactNotFoundException
     */
    public function findContactById(int $id) : Contact
    {
        try {
            return $this->transformContact($this->findOneOrFail($id));
        } catch (ModelNotFoundException $e) {
            throw new ContactNotFoundException($e);
        }
    }

    /**
     * @param array $file
     * @param null $disk
     * @return bool
     */
    public function deleteFile(array $file, $disk = null) : bool
    {
        return $this->update(['cover' => null], $file['contact']);
    }

    /**
     * @return bool
     */
    public function deleteCover(): bool
    {
        return $this->model->update(['cover' => null]);
    }

    /**
     * @param UploadedFile $file
     * @return string
     */
    public function saveCoverImage(UploadedFile $file) : string
    {
        return $file->store('contact', ['disk' => 'public']);
    }
}
