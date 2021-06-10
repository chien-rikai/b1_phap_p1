<?php

namespace App\Traits;

use Image;
use Storage;

trait ImageResize
{
    /**
     * function uploadImage
     * img data image
     * url save image
     * filename name of image
     * size width and height
     * status cut image or resize : 0 => Image aspect ratio, 1 => cut image , 2 => resize image custom. default status = 0
     * quality
     */
    public function uploadImage($img, $filename, $url, $sizeX = 960, $sizeY = 0, $status = 0, $quality = 100)
    {   
        $path = storage_path('app/public/' . $url . '/' . $filename);
    
        if (empty(Storage::directories('public/'.$url))) {
            Storage::makeDirectory('public/'.$url);
        }
       
        //Create image size and save image local
        try {
            switch ($status):
                case 1:
                    Image::make($img->getRealPath())->resize($sizeX, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->fit($sizeX, $sizeY)->save($path, $quality);
                    break;
                case 2:
                    Image::make($img->getRealPath())->resize($sizeX, $sizeY, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($path, $quality);
                    break;
                default:
                    Image::make($img->getRealPath())->resize($sizeX, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($path, $quality);
            endswitch;

            return 1;
        } catch (\Exception $exception) {
            return $exception;
        }

    }
}