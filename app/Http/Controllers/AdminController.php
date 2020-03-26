<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Traits\ImagePath;
use App\Traits\StoreImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    use StoreImageTrait;
    use ImagePath;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:admin-edit', ['only' => ['edit', 'update']]);
    }


    /**
     * Show the form for admin creation
     * view or error
     */
    public function create()
    {
        if (Auth::user()->hasPermissionTo('admin-create')) {
            return view('admin.admin.create');
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');
        }

    }


    public function store(AdminStoreRequest $request)
    {
        if (Auth::user()->hasPermissionTo('admin-create')) {
            $admin = new Admin;
            $admin->fill($request->validated());
            $admin->password = Hash::make($request->password);
            $admin->image = $this->storeImage($request, 'image');
            $admin->save();
            return redirect()->back()->withInput($request->only('email'))->with('success', 'Администратор ' . $admin->name . ' был успешно добавлен!');
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
            $admin = Admin::findOrFail($id);
            return view('admin.admin.show', compact('admin'));
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');

        }
    }

    /**
     * Show edit admin page
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Request $request)
    {
        if (Auth::user()->hasPermissionTo('admin-edit')) {
            $id = $request->id;
            $admin = Admin::findOrFail($id);
            $roles = $admin->getRoleNames();
            return view('admin.admin.edit', compact('admin', 'roles'));
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
            $admin = Admin::findOrFail($id);
            $admin->fill($request->validated());
            $admin->password = $request->password ? Hash::make($request->password) : $admin->password;
            $admin->phone = strlen(preg_replace("/[^0-9]/", "", $request->phone)) > 2 ? preg_replace("/[^0-9]/", "", $request->phone) : null;
            if ($request->activate !== 'on') $admin->activate = 'off';
            if ($request->hasFile('image')) $admin->image = $this->storeImage($request, 'image');
            $admin->save();
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
            $admin = Admin::findOrFail($id);
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
