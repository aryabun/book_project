<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    //
    public function img_destroy($id)
    {
        $image = Image::find($id);
        Storage::delete('public/images/' . $image->name);
        $image->delete();

        return back();
    }
}
