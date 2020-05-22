<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Http\Requests\ProductStoreRequest;
use App\Product;
use App\Traits\StoreProductImages;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends MainController
{
    use StoreProductImages;
    protected $productRepository;

    public function __construct(ProductContract $productRepository)
    {
        $this->middleware('auth:admin');
        $this->productRepository = $productRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * @param ProductStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductStoreRequest $request)
    {
        if (Auth::user()->hasPermissionTo('product-create')) {
            $product = $this->productRepository->createProduct($request);
            $this->storeProductImages($product->id, $request);
            return redirect()->route('product.index')->with('success', 'Товар ' . $product->id . ' был успешно добавлен!');
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('product'));
    }

    public function getFullProduct($id)
    {
        $product = $this->productRepository->getProductWithAttributes($id);
        return response()->json($product);
    }
}
