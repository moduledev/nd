<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Http\Requests\AdminStoreRequest;
use App\Traits\ImagePath;
use App\Traits\StoreImageTrait;
use Illuminate\Http\Request;
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
//        dd($request->all());
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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
