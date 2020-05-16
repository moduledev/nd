<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Contracts\AdminContract;
use App\Contracts\AttributeContract;
use App\Contracts\CategoryContract;
use App\Http\Controllers\MainController;
use App\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class DashboardController extends MainController
{
    protected $adminRepository;
    protected $attributeRepository;
    protected $cateroryRepository;

    public function __construct(AdminContract $adminRepository, AttributeContract $attributeRepository, CategoryContract $cateroryRepository)
    {
        $this->middleware('auth:admin');
        $this->adminRepository = $adminRepository;
        $this->attributeRepository = $attributeRepository;
        $this->cateroryRepository = $cateroryRepository;
    }

    /**
     * Display main dashboard page.
     *
     * @return Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        return view('admin.dashboard.index', compact('user'));
    }

    /**
     * Display admins page
     *
     * @return Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function admins()
    {
        if (Auth::user()->hasPermissionTo('admin-list')) {
            $admins = $this->adminRepository->listAdmins();
            $this->setPageTitle('Список администраторов', '');
            return view('admin.admin.index', compact('admins'));
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');
        }

    }

    /**
     * Display roles page
     * @return Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function roles()
    {
        if (Auth::user()->hasPermissionTo('role-list')) {
            $roles = Role::paginate(5);
            return view('admin.role.index', compact('roles'));
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');
        }
    }

    /**
     * Display products page
     * @return Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function products()
    {
        if (Auth::user()->hasPermissionTo('product-list')) {
            $products = Product::with(['images','categories'])->get();
            return view('admin.product.index', compact('products'));
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');
        }
    }

    /**
     * Display attribute page
     * @param Request $request
     * @return Factory|\Illuminate\View\View
     */
    public function attributes(Request $request)
    {
        $attributes = $this->attributeRepository->listAttributes();
        $this->setPageTitle('Атрибуты', '');
        if (Auth::user()->hasPermissionTo('attribute-list')) {
            return $request->ajax() ? response()->json($attributes) : view('admin.attribute.index', compact('attributes'));
        }
    }

    public function categories(Request $request)
    {
        if (Auth::user()->hasPermissionTo('category-list')) {
            $categories = $this->cateroryRepository->listCategories();
            $this->setPageTitle('категории', '');
            return $request->ajax() ? response()->json($categories) : view('admin.category.index', compact('categories'));
        }
    }

}
