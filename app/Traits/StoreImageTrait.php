<?php


namespace App\Traits;

use Illuminate\Http\Request;

trait StoreImageTrait
{
    public function storeImage(Request $request, $fileName)
    {
        if($request->hasFile($fileName)){
            $path = $request->file('image')->store('admin', 'public');
            return $path;
        }
    }
}
