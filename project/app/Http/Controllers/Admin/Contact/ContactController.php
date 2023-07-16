<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact\Contact;
use App\Models\Contact\Repositories\Interfaces\ContactRepositoryInterface;
use App\Models\Contact\Repositories\ContactRepository;
use App\Models\Contact\Requests\CreateContactRequest;
use App\Models\Contact\Requests\UpdateContactRequest; 
use App\Models\Contact\Transformations\ContactTransformable; 

use App\Models\Shop\Tools\UploadableTrait;
use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManagerStatic;

class ContactController extends Controller
{
    use ContactTransformable, UploadableTrait; 

     /**
     * @var ContactRepositoryInterface
     */
    private $contactRepo;

    /**
     * ContactController constructor.
     * @param ContactRepositoryInterface $contactRepository
     */
    public function __construct(ContactRepositoryInterface $contactRepository) 
    {
        $this->contactRepo = $contactRepository;        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact =  $this->contactRepo->findContactById(1);

        return view('admin.contact.edit', [
            'contact' => $contact
                        
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateContactRequest $request
     * @param  int $id 
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request, int $id)
    {
        $contact = $this->contactRepo->findContactById($id);

        $data['name_proprietary'] = $request->input('name_proprietary');
        $data['name_enterprise'] = $request->input('name_enterprise');
        $data['description'] = $request->input('description');
        $data['address'] = $request->input('address');
        $data['e_mail'] = $request->input('e_mail');
        $data['telephone_number_1'] = $request->input('telephone_number_1'); 
        $data['telephone_number_2'] = $request->input('telephone_number_2');
        $data['telephone_number_3'] = $request->input('telephone_number_3');
        $data['profile_youtube'] = $request->input('profile_youtube');
        $data['profile_twitter'] = $request->input('profile_twitter');
        $data['profile_mercadolibre'] = $request->input('profile_mercadolibre');
        $data['profile_facebook'] = $request->input('profile_facebook');
        
        
        if ($request->hasFile('cover') && $request->file('cover') instanceof UploadedFile) {
            $data['cover'] = $this->contactRepo->saveCoverImage($request->file('cover'));
        }

        //$this->saveContactImages($request, $contact);

        $this->contactRepo->updateContact($data, $id);

        $request->session()->flash('message', 'Update successful');

        return redirect()->route('admin.contact.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeImage(Request $request)
    {
        $this->contactRepo->deleteFile($request->only('contact', 'image'), 'uploads');
        request()->session()->flash('message', 'Image delete successful');
        
    }
}
