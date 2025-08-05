<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photograph;
use App\Models\User;


class HomeController extends Controller
{
    public function home()
    {
        $user = User::first();
        $photos = Photograph::where('album_id', null)
            ->paginate(9);

        return view('welcome', compact('user', 'photos'));
    }

    public function contact()
    {
        $user = User::first();

        return view('contacto', compact('user'));
    }

    public function albums()
    {
        $user = User::first();
        $albums = Album::with('photographs')->get();
        return view('albumes', compact('user','albums'));
    }

    public function showAlbum($id)
    {
        $user = User::first();
        $photos = Photograph::where('album_id', $id)
            ->paginate(9);

        return view('show-album', compact('user', 'photos'));
    }
}
