<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    //invoke
    public function store(Request $request)
    {
        //There is no relationships here so we will
        //fake the object of a model
        //this only handles the images uploaded by the editor
        $post = new Post();
        $post->id = 0;
        $post->exists = true;
        $image = $post->addMediaFromRequest('upload')->toMediaCollection('editor_images');

        return response()->json([
            'url' => $image->getUrl(),
        ]);
    }
}
