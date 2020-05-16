<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\CategoryContract;
use App\Http\Controllers\MainController;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CategoryController extends MainController
{
    protected $categoryRepository;

    public function __construct(CategoryContract $categoryRepository)
    {
        $this->middleware('auth:admin');
        $this->categoryRepository = $categoryRepository;
    }


    public function create()
    {
        if (Auth::user()->hasPermissionTo('category-create')) {
            $this->setPageTitle('Добавить новую категорию', '');
            return view('admin.category.create');
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');
        }
    }


    public function store(CategoryStoreRequest $request)
    {
        if (Auth::user()->hasPermissionTo('category-create')) {
            $category = $this->categoryRepository->createCategory($request);
            return view('admin.category.index')->withInput($request->only('code'))->with('success', 'Артибут ' . $category->name . ' успешно добавлен');
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');
        }
    }


    public function show($id)
    {
        if (Auth::user()->hasPermissionTo('category-show')) {
            $category = $this->categoryRepository->getCategoryById($id);
            $categoryProducts = $category->products()->get();
            $this->setPageTitle('Просмотр категории', '');
            return view('admin.category.show', compact('category', 'categoryProducts'));
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($id)
    {
        if (Auth::user()->hasPermissionTo('category-edit')) {
            $category = $this->categoryRepository->getCategoryById($id);
            $this->setPageTitle('Редактирование категории','');
            return view('admin.category.edit', compact('category'));
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
    public function update(CategoryUpdateRequest $request, $id)
    {
        $category = $this->categoryRepository->updateCategory($request, $id);
        return redirect()->route('category.index')->with('success', 'Категория ' . $category->name_ru . ' был успешно изменен');
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
