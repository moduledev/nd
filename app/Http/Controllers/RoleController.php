<?php
/**
 * Store new permission
 * @param Request $request
 * */

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show form form new role
     * return view admin.role.create
     */
    public function create(){
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
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:roles',
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator);
            }

            Role::create(['name' => $request->name,'guard_name' => 'web']);
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
            $role = Role::findOrFail($id);
            $permissions = $role->permissions;
            return view('admin.roles.show',compact('role','permissions'));
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        if (Auth::user()->hasPermissionTo('role-edit')) {
            $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
            $role = Role::findOrFail($id);
            $userPermissions = $role->permissions;
            $permissions = Permission::all();
            return view('admin.role.edit', compact('role','permissions','userPermissions'));
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'permissions' => 'array',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator);
        }
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();
        $adminPermissions = new PermissionController();
        $adminPermissions->assignPermission($request, $id);
        return redirect()->back()->with('success', 'Роль ' . $role->name . ' был успешно изменен!');
    }


    /**Delete role
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        if (Auth::user()->hasPermissionTo('role-delete')) {
            $role = filter_var($request->id, FILTER_SANITIZE_SPECIAL_CHARS);
            Role::findOrFail($role)->delete();
            return redirect()->back()->with('success', 'Роль ' . $role . ' была успешно удалена!');
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');
        }
    }

    /**Assign role to user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function assignRole(Request $request, $adminId)
    {
        if (Auth::user()->hasPermissionTo('role-assign')) {
            $validator = Validator::make($request->all(), [
                'roles' => 'array',
            ]);

            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator);
            }

            $admin = Admin::findOrFail($adminId);
//            if($admin->hasRole($request->role)) return redirect()->back()->with('warning', 'Роль ' . $request->role . ' уже была добавлена!');
            $admin->syncRoles($request->roles);
            return redirect()->back()->with('success', 'Роль  была успешно добавлена!');
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');
        }
    }

}
