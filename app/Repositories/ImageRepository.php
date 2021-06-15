<?php

namespace App\Repositories;

use Image;
use Session;
use Storage;

/**
 *
 * Class ImageRepository
 * @package App\Repositories
 */
class ImageRepository
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
        $filename_ = $filename . '.' . $img->getClientOriginalExtension();
        $path = storage_path('app/public/' . $url . '/' . $filename_);

        if (empty(Storage::directories($url))) {
            Storage::makeDirectory($url);
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

            $result = [
                'filename' => $filename_,
                'path' => $path,
            ];

            return $result;
        } catch (\Exception $exception) {
            return $exception;
        }

    }


}
