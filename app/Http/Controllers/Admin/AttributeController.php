<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\AttributeContract;
use App\Http\Controllers\MainController;
use App\Http\Requests\AttributeRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AttributeController extends MainController
{
    protected $attributeRepository;

    public function __construct(AttributeContract $attributeRepository)
    {
        $this->middleware('auth:admin');
        $this->attributeRepository = $attributeRepository;
    }


    public function listAttributes(Request $request)
    {
        $attributes = $this->attributeRepository->listAttributes();
        if (Auth::user()->hasPermissionTo('attribute-list')) {
            return $request->ajax() ? response()->json($attributes) : view('attribute.index', 'attribute');
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');

        }
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        if (Auth::user()->hasPermissionTo('attribute-create')) {
            $this->setPageTitle('Добавление нового атрибута ', '');
            return view('admin.attribute.create');
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');
        }
    }


    /**
     * @param AttributeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AttributeRequest $request)
    {
        if (Auth::user()->hasPermissionTo('attribute-create')) {
            $attribute = $this->attributeRepository->createAttribute($request);
            return redirect()->route('attribute.index')->withInput($request->only('code'))->with('success', 'Артибут ' . $attribute->name . ' успешно добавлен');
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($id)
    {
        if (Auth::user()->hasPermissionTo('attribute-edit')) {
            $attribute = $this->attributeRepository->findAttributeById($id);
            $this->setPageTitle('Изменение атрибута ', $attribute->name_ru);
            return view('admin.attribute.edit', compact('attribute'));
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
