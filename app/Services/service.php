<?php

namespace App\Services;



class Service
{
    //single image upload
    public static function imageUpload($image, $folder)
    {
        if ($image) {
            $imagePath = $image->store($folder, 'public');
            return $imagePath;
        }
        return null;
    }
}
















