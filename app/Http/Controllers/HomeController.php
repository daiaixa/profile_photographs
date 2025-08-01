<?php

namespace App\Http\Controllers;

use App\Models\Photograph;
use App\Models\User;


class HomeController extends Controller
{
    public function home() 
    {
        $user = User::first();
        $photos = Photograph::where('album_id', null)
            ->paginate(10);
        return view('welcome', compact('user', 'photos'));
    }
}
