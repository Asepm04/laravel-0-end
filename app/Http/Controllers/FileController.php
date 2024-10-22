<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;


class FileController extends Controller
{
    public function UploadFile(Request $request)
    {
        $file = $request->file("picture");
        $file->storePubliclyAs("pictures",$file->getClientOriginalName(),"public");
        return "OK :". $file->getClientOriginalName();
    }
}
