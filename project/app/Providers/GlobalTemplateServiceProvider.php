<?php

namespace App\Providers;

use App\Models\Shop\Carts\Repositories\CartRepository;
use App\Models\Shop\Carts\ShoppingCart;
use App\Models\Shop\Categories\Category;
use App\Models\Shop\Categories\Repositories\CategoryRepository;
use App\Models\Shop\Employees\Employee;
use App\Models\Shop\Employees\Repositories\EmployeeRepository;
use App\Models\Contact\Contact;
use App\Models\Contact\Repositories\ContactRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

/**
 * Class GlobalTemplateServiceProvider
 * @package App\Providers
 * @codeCoverageIgnore
 */
class GlobalTemplateServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer([
            'layouts.admin.app',
            'layouts.admin.sidebar',
            'admin.shared.products'
        ], function ($view) {
            $view->with('admin', Auth::guard('employee')->user());
        });

        view()->composer(['layouts.front.app', 'front.categories.sidebar-category'], function ($view) {
            $view->with('categories', $this->getCategories());
            $view->with('cartCount', $this->getCartCount());
            $view->with('contact', $this->getContact());
        });

        /**
         * breadcrumb
         */
        view()->composer([
            "layouts.admin.app"
        ], function ($view) {
            $breadcrumb = [
                ["name" => "Dashboard", "url" => route("admin.dashboard"), "icon" => "fa fa-dashboard"],
            ];
            $paths = request()->segments();
            if (count($paths) > 1) {
                foreach ($paths as $key => $pah) {
                    if ($key == 1)
                        $breadcrumb[] = ["name" => ucfirst($pah), "url" => request()->getBaseUrl() . "/" . $paths[0] . "/" . $paths[$key], 'icon' => config("module.admin." . $pah . ".icon")];
                    elseif ($key == 2)
                        $breadcrumb[] = ["name" => ucfirst($pah), "url" => request()->getBaseUrl() . "/" . $paths[0] . "/" . $paths[1] . "/" . $paths[$key], 'icon' => config("module.admin." . $pah . ".icon")];
                }
            }
            $view->with(
                [
                    "breadcrumbs" => $breadcrumb
                ]
            );
        });


        view()->composer(['layouts.front.category-nav'], function ($view) {
            $view->with('categories', $this->getCategories());
        });
    }

    /**
     * Get contact information
     *
     */
    private function getContact()
    {
        $contactRepo = new ContactRepository(new Contact);
        return $contactRepo->findContactById(1);
    }

    /**
     * Get all the categories
     *
     */
    private function getCategories()
    {
        $categoryRepo = new CategoryRepository(new Category);
        return $categoryRepo->listCategories('name', 'asc', 1)->whereIn('parent_id', [1]);
    }

    /**
     * @return int
     */
    private function getCartCount()
    {
        $cartRepo = new CartRepository(new ShoppingCart);
        return $cartRepo->countItems();
    }

    /**
     * @param Employee $employee
     * @return bool
     */
    private function isAdmin(Employee $employee)
    {
        $employeeRepo = new EmployeeRepository($employee);
        return $employeeRepo->hasRole('admin');
    }
}
