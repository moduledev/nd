<?php


namespace App\Traits;


use App\Http\Requests\ProductStoreRequest;
use App\ProductImage;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Spatie\ImageOptimizer\OptimizerChainFactory;

trait StoreProductImages
{
    public function storeProductImages($productId, $request)
    {
        foreach ($request->productImages as $key => $file) {
            $test = $request->all();
            Image::make($file)->insert(public_path() . '/' . 'img' . '/' . 'watermark.png', 'bottom-right')->save();
            $path = $file->store('products_images', 'public');
            $pathFile = Storage::disk('public')->path($path);
            $optimizerChain = OptimizerChainFactory::create();
            $optimizerChain->optimize($pathFile);
            $img = new ProductImage();
            $img->product_id = $productId;
            $img->path = $path;
            (int) $request->mainImage === $key && (int) $request->mainImage !== null  ? $img->main_image = 1 : $img->main_image =  null;
            $img->save();
        }
    }
}
