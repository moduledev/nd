<?php


namespace App\Traits;

trait ImagePath
{
    public function imagePath($imagesFolder, $destinationFolder)
    {
        return storage_path($imagesFolder . $destinationFolder);
    }
}
