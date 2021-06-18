<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TemporaryMedia;

class FileUploadController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('tmp/'. $folder, $filename);

            TemporaryMedia::create([
                'path' => $folder,
                'name' => $filename
            ]);

            return $folder;
        }
        return '';
    }
}
