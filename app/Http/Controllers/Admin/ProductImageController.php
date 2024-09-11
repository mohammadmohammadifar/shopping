<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function upload($primaryImage, $images)
    {
        $fileNamePrimaryImage=$primaryImage->getClientOriginalName();
        $primaryImage->move(public_path(env('UPLOAD_IMAGE')),$fileNamePrimaryImage);

        $imageUpload=[];
        foreach($images as $image){
            $fileNameImage=$image->getClientOriginalName();
            $image->move(public_path(env('UPLOAD_IMAGE')),$fileNameImage);

            array_push($imageUpload,$fileNameImage);
        }

        return ['fileNamePrimaryImage'=>$fileNamePrimaryImage ,'imageUpload'=>$imageUpload ];
    }
}
