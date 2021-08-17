<?php

namespace App\Service;

use Illuminate\Http\UploadedFile;

class ImageSaver
{
    public function getImageFromForm(UploadedFile $file)
    {
        return $file->store('public/images');
    }
}
