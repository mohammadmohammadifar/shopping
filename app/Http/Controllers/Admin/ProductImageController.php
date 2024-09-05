<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function upload($primaryImage, $images)
    {
        $fileNamePrimaryImage=$primaryImage->getClientOriginalName();
        $fileNamePrimaryImage->move(public_path(env('UPLOAD_IMAGE')),$fileNamePrimaryImage);

        $imageUpload=[];
        foreach($images as $image){
            $fileNameImage=$image->getClientOriginalName();
            $fileNameImage->move(public_path(env('UPLOAD_IMAGE')),$fileNameImage);

            array_push($fileNameImage, $imageUpload);
        }

        return ['fileNamePrimaryImage'=>$fileNamePrimaryImage ,'fileNameImage'=>$imageUpload ];
    }
}
