<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Http\Requests\ProductStoreRequest;
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
//            $test = $request->all();
            $product = $this->productRepository->createProduct($request);
            $this->productRepository->createProductTranslations($product, $request);

//            foreach ($request->productAttributes as $productAttribute) {
//                $ee = json_decode($productAttribute);
//                $ee1 = $ee->attribute_name;
//            }
            $this->storeProductImages($request);
            return response()->json($request);
        } else {
            return redirect()->back()->with('error', 'У Вас нет прав для выполнения этой операции');

        }
    }
}
