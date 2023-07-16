<?php

namespace App\Http\Controllers\Front;

use App\Models\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Models\Shop\Products\Product;
use App\Models\Shop\Products\Transformations\ProductTransformable;

use App\Models\Contact\Repositories\Interfaces\ContactRepositoryInterface;
use App\Models\Contact\Transformations\ContactTransformable;
use App\Models\Contact\Contact;

class HomeController
{
    use ProductTransformable;
    use ContactTransformable;

    /**
     * @var CategoryRepositoryInterface
     * @var ContactRepositoryInterface
     */
    private $categoryRepo;
    private $contactRepo;

    /**
     * HomeController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     * @param ContactRepositoryInterface $contactRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository, ContactRepositoryInterface $contactRepository)
    {
        $this->categoryRepo = $categoryRepository;
        $this->contactRepo = $contactRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $cat1 = $this->categoryRepo->findCategoryById(2);
        $cat1->products = $cat1->products->map(function (Product $item) {
            return $this->transformProduct($item);
        });

        $cat2 = $this->categoryRepo->findCategoryById(3);
        $cat2->products = $cat2->products->map(function (Product $item) {
            return $this->transformProduct($item);
        });

        return view('front.index', compact('cat1', 'cat2'));
    }

    /**
     * Contact page main view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function viewContact(){

        $contact = $this->contactRepo->findContactById(1);
        return view('front.contact',compact('contact'));
    }
}
