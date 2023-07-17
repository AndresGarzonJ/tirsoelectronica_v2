<?php 

namespace App\Models\Contact\Repositories;

//-del- use App\Models\Shop\Base\BaseRepository;
use Andresgarzonj\Baserepo\BaseRepository; 
use App\Models\Contact\Exceptions\ContactInvalidArgumentException;
use App\Models\Contact\Exceptions\ContactNotFoundException;
use App\Models\Contact\Contact;
use App\Models\Contact\Repositories\Interfaces\ContactRepositoryInterface;
use App\Models\Contact\Transformations\ContactTransformable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ContactRepository extends BaseRepository implements ContactRepositoryInterface
{
    use ContactTransformable;

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
     * @param array $params
     * @param int $id 
     * @return bool
     */
    public function updateContact(array $params, int $id=1) : bool
    {
        try {
            return $this->update($params, $id);
        } catch (QueryException $e) {
            throw new ContactInvalidArgumentException($e->getMessage());
        }
    }

    /**
     * Find the contact by ID
     *
     * @param int $id
     * @return Contact
     */
    public function findContactById(int $id = 1) : Contact
    {
        try {
            return $this->transformcontact($this->findOneOrFail($id));
        } catch (ModelNotFoundException $e) {
            throw new ContactNotFoundException($e->getMessage());
        }
    }


    /**
     * @param $file
     * @param null $disk
     * @return bool
     */
    public function deleteFile(array $file, $disk = null) : bool
    {
        return $this->update(['cover' => null], $file['contact']);
    }

    
    /**
     * @param UploadedFile $file
     * @return string 
     */
    public function saveCoverImage(UploadedFile $file) : string
    //public function saveCoverImage(ImageManagerStatic $file) : string
    {
        return $file->store('contact', ['disk' => 'public']);
         
    }
    
}
