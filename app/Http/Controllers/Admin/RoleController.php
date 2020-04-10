<?php
/**
 * Store new permission
 * @param Request $request
 * */

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Contracts\AdminContract;
use App\Contracts\PermissionContract;
use App\Contracts\RoleContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\MainController;


class RoleController extends MainController
{
    protected $roleRepository;
    protected $permissionRepository;
    protected $adminRepository;

    public function __construct(RoleContract $roleRepository, PermissionContract $permissionRepository, AdminContract $adminRepository)
    {
        $this->middleware('auth:admin');
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
        $this->adminRepository = $adminRepository;
    }

    /**
     * Show form form new role
     * return view admin.role.create
     */
    public function create()
    {
        $this->setPageTitle('Создать новую роль', '');
        return view('admin.role.create');
    }

    /**
     * Store new role
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if (Auth::user()->hasPermissionTo('role-create')) {
            $this->roleRepository->createRole($request);
            return redirect()->back()->with('success', 'Роль была успешно добавлена!');
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');

        }
    }

    /**
     * Display role.
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show($id)
    {
        if (Auth::user()->hasPermissionTo('role-show')) {
            $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
            $role = $this->roleRepository->getRoleById($id);
            $permissions = $role->permissions;
            $this->setPageTitle('Создание новой роли', '');
            return view('admin.role.show', compact('role', 'permissions'));
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        if (Auth::user()->hasPermissionTo('role-edit')) {
            $role = $this->roleRepository->getRoleById($id);
            $userPermissions = $role->permissions;
            $permissions = $this->permissionRepository->listPermissions();
            $this->setPageTitle('Изменить роль - ', $role->name);
            return view('admin.role.edit', compact('role', 'permissions', 'userPermissions'));
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $role = $this->roleRepository->updateRole($request, $id);
        $this->permissionRepository->assignPermission($request, $role);
        return redirect()->back()->with('success', 'Роль ' . $role->name . ' был успешно изменен!');
    }


    /**Delete role
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        if (Auth::user()->hasPermissionTo('role-delete')) {
            $role = $this->roleRepository->deleteRole($request, $request->id);
            return redirect()->route('role.index')->with('success', 'Роль ' . $role . ' была успешно удалена!');
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');
        }
    }

}
