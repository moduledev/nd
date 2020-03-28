<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Validator;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**Assign permission to role
     * @param Request $request
     * @param $adminId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function assignPermission(Request $request, $adminId)
    {
        if (Auth::user()->hasPermissionTo('permission-assign')) {
            $validator = Validator::make($request->all(), [
                'permissions' => 'array'
            ]);

            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator);
            }

            $role = Role::findOrFail($adminId);
            $role->syncPermissions($request->permissions);

            return redirect()->back()->with('success', 'Разрешения ' . implode(',', $request->permissions) . ' были успешно добавлены!');
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');
        }
    }
}
