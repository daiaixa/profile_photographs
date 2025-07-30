<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photograph;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home() 
    {
        $user = User::first();
        $photos = DB::table('photographs')
        ->where('album_id', null)
        ->get();

        return view('welcome', compact('user', 'photos'));
    }
}
