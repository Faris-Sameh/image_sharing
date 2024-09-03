<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait ImagesTrait
{
    /**
     * Store the uploaded image and return its path.
     *
     * @param  UploadedFile  $image
     * @param  string  $folder
     * @return string
     */
    public function uploadImage(UploadedFile $image, $folder = 'images')
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = $image->storeAs("public/$folder", $imageName);

        return $imageName; // Return just the name if you are storing the path in the database.
    }
}
