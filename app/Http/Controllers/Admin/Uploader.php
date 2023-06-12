<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Uploader extends Controller
{

    public static function upload(Request $request, $targetDir) {
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();

        $extension = $file->extension();
        $fileName = time().rand(100,999) . '.' . $extension;

        // Upload file
        $request->file('image')->storeAs($targetDir, $fileName);

        return $fileName;
    }

    public static function deleteDirectory($path)
    {
        return Storage::deleteDirectory($path);
    }

    public static function deleteFile($path)
    {
        return Storage::delete($path);
    }
}
