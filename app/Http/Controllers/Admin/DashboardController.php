<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Contracts\AdminContract;
use App\Http\Controllers\MainController;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class DashboardController extends MainController
{
    protected $adminRepository;

    public function __construct(AdminContract $adminRepository)
    {
        $this->middleware('auth:admin');
        $this->adminRepository = $adminRepository;
    }

    /**
     * Display main dashboard page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        return view('admin.dashboard.index', compact('user'));
    }

    /**
     * Display admins page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function products()
    {
        if (Auth::user()->hasPermissionTo('product-list')) {
            $products = Product::with('images')->get();
            return view('admin.product.index', compact('products'));
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');
        }
    }

}
