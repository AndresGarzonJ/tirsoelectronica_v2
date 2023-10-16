<?php

namespace App\Http\Controllers\Front;

use App\Models\Contact\Repositories\Interfaces\ContactRepositoryInterface;
use App\Models\Contact\Transformations\ContactTransformable;

class ContactController
{
    use ContactTransformable;

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
     * Contact page main view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $contact = $this->contactRepo->findContactById(1);
        return view('front.contact', compact('contact'));
    }
}
