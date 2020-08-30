<?php

namespace App\Http\Controllers\Shop;

use App\Category;
use App\Contracts\ProductContract;
use App\Http\Controllers\MainController;
use App\Product;
use App\Repositories\CategoryRepository;

class ShopController extends MainController
{
    protected $productRepository;
    protected $categoryRepository;

    public function __construct(ProductContract $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        app()->setLocale('ru');
    }

    public function index()
    {
//        $products = $this->categoryRepository->getCategoriesWithProducts();
        $categories = Category::with('products')->get();
        return view('shop.pages.index', compact('categories'));
    }

}
