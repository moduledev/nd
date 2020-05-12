<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Contracts\AdminContract;
use App\Contracts\RoleContract;
use App\Http\Controllers\MainController;
use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Traits\ImagePath;
use App\Traits\StoreImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;


class AdminController extends MainController
{
    use StoreImageTrait;
    use ImagePath;

    protected $adminRepository;
    protected $roleRepository;

    public function __construct(AdminContract $adminRepository, RoleContract $roleRepository)
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:admin-edit', ['only' => ['edit', 'update']]);
        $this->adminRepository = $adminRepository;
        $this->roleRepository = $roleRepository;
    }


    /**
     * Show the form for admin creation
     * view or error
     */
    public function create()
    {
        if (Auth::user()->hasPermissionTo('admin-create')) {
            $roles = $this->roleRepository->listRoles();
            $this->setPageTitle('Добавить нового администратора','');
            return view('admin.admin.create', compact('roles'));
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');
        }

    }


    public function store(AdminStoreRequest $request)
    {
        if (Auth::user()->hasPermissionTo('admin-create')) {
            $admin =  $this->adminRepository->createAdmin($request);
            $this->roleRepository->assignRoleToAdmin($request,$admin);
            return redirect()->route('admin.index')->withInput($request->only('email'))->with('success', 'Администратор ' . $admin->name . ' был успешно добавлен!');
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');
        }
    }

    /**
     * Display specific admin page
     * @param int $id
     * return view or error
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show($id)
    {
        if (Auth::user()->hasPermissionTo('admin-show')) {
            $admin = $this->adminRepository->getAdminById($id);
            $this->setPageTitle('Данные о администраторе ', $admin->name);
            $adminRoles = $admin->getRoleNames();
            return view('admin.admin.show', compact('admin','adminRoles'));
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');

        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($id)
    {
        if (Auth::user()->hasPermissionTo('admin-edit')) {
            $admin = $this->adminRepository->getAdminById($id);
            $roles = $this->roleRepository->listRoles();
            $adminRoles = $admin->getRoleNames();
            $this->setPageTitle('Редактирование данных администратора ',$admin->name);
            return view('admin.admin.edit', compact('admin', 'adminRoles', 'roles'));
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');
        }
    }

    /**
     * Update admins data
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminUpdateRequest $request, $id)
    {
        if (Auth::user()->hasPermissionTo('admin-edit')) {
            $admin = $this->adminRepository->updateAdmin($request, $id);
            $this->roleRepository->assignRoleToAdmin($request,$admin);
            return redirect()->back()->with('success', 'Данные администратора ' . $admin->name . ' были успешно обновлены!');
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');
        }

    }

    /**
     * Remove admin from DB
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if (Auth::user()->hasPermissionTo('admin-delete')) {
            $admin = $this->adminRepository->getAdminById($id);
            if ($admin->id !== Auth::guard('admin')->User()->id) {
                if ($admin->image) unlink(storage_path('app/public' . '/' . $admin->image));
                $admin->delete();
                return redirect()->route('admin.index')->with('success', 'Пользователь ' . $admin->name . ' был успешно удален!');
            } else {
                return redirect()->back()->with('error', 'Администратор не может удалить сам себя!');
            }
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');
        }
    }
}
