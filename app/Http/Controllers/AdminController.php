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

class AdminController extends Controller
{
    use StoreImageTrait;
    use ImagePath;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();
        return view('admin.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.create');
    }


    public function store(AdminStoreRequest $request)
    {
        $admin = new Admin;
        $admin->fill($request->validated());
        $admin->password = Hash::make($request->password);
         $admin->image = $this->storeImage($request, 'image');
        $admin->save();
        return redirect()->back()->withInput($request->only('email'))->with('success', 'Администратор ' . $admin->name . ' был успешно добавлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.admin.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $admin = Admin::findOrFail($id);
        return view('admin.admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUpdateRequest $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->fill($request->validated());
        $admin->password = Hash::make($request->password);
        if($request->activate !== 'on') $admin->activate = 'off';
        if($request->hasFile('image')) $admin->image = $this->storeImage($request, 'image');
        $admin->save();
        return redirect()->back()->with('success', 'Данные администратора ' . $admin->name . ' были успешно обновлены!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        if ($admin->id !== Auth::guard('admin')->User()->id) {
            $admin->delete();
            return redirect()->route('admin.index')->with('success', 'Пользователь ' . $admin->name . ' был успешно удален!');
        } else {
            return redirect()->back()->with('error', 'Администратор не может удалить сам себя!');
        }
    }
}
