<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Uploader extends Controller
{

    public static function upload(Request $request, $targetDir) {
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();

        // Upload file
        $path = $request->file('image')->storeAs($targetDir, $fileName);

        return $path;
    }
}
