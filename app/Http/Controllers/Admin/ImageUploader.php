<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProductImage;
use Illuminate\Http\Request;

class ImageUploader extends Controller
{
    public function deleteImage(Request $request)
    {
        $img = ProductImage::findOrFail($request->id);
        unlink(storage_path('app/public/'.$img->path));
        $img->delete();
    }

    public function setMainImage(Request $request)
    {
        $img = ProductImage::findOrFail($request->id);
        $img->main_image ? $img->main_image = null : $img->main_image = 1;
        $img->save();
    }
}
