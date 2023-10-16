<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Models\Contact\Exceptions\ContactUpdateErrorException;
use App\Models\Contact\Repositories\Interfaces\ContactRepositoryInterface;
use App\Models\Contact\Repositories\ContactRepository;
use App\Models\Contact\Requests\UpdateContactRequest;
use App\Http\Controllers\Controller;
use App\Models\Contact\Transformations\ContactTransformable;
use App\Models\Shop\Tools\UploadableTraitContact;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class ContactController extends Controller
{
    use ContactTransformable, UploadableTraitContact;

    /**
     * @var ContactRepositoryInterface
     */
    private $contactRepo;

    /**
     * ContactController constructor.
     *
     * @param ContactRepositoryInterface $contactRepository
     */
    public function __construct(
        ContactRepositoryInterface $contactRepository
    ) {
        $this->contactRepo = $contactRepository;
        $this->middleware(['permission:update-contact, guard:employee'], ['only' => ['index', 'update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // public function edit($id)
        $contact = $this->contactRepo->findContactById(1);

        return view('admin.contact.edit', [
            'contact' => $contact
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateContactRequest $request
     * @param  int $id 
     * 
     * @return RedirectResponse
     * @throws ContactUpdateErrorException
     */
    public function update(UpdateContactRequest $request, int $id)
    {
        $contact = $this->contactRepo->findContactById($id);
        $contactRepo = new ContactRepository($contact);
        $data = $request->except('_token', '_method');
        if ($request->hasFile('cover') && $request->file('cover') instanceof UploadedFile) {
            $data['cover'] = $this->contactRepo->saveCoverImage($request->file('cover'));
        }
        $contactRepo->updateContact($data);
        return redirect()->route('admin.contact.index')->with('message', 'Update successful');
    }

    /**
     * @param Request $request
     * 
     * @return RedirectResponse
     */
    public function removeImage(Request $request)
    {
        $contact = $this->contactRepo->findOneOrFail($request->input('contact_id'));
        $contact->cover = null;
        $contact->save();

        return redirect()->back()->with('message', 'Image delete successful');
    }
}
