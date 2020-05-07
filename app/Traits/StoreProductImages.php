<?php


namespace App\Traits;


use App\Http\Requests\ProductStoreRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Spatie\ImageOptimizer\OptimizerChainFactory;

trait StoreProductImages
{


    public function storeProductImages(ProductStoreRequest $request)
    {
        foreach ($request->productImages as $file) {
            Image::make($file)->resize(10, 10);
            $path = $file->store('products_images', 'public');
            $pathFile = Storage::disk('public')->path($path);
            $optimizerChain = OptimizerChainFactory::create();
            $optimizerChain->optimize($pathFile);

        }
    }
}
