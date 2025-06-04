<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function getHome()
    {
        $posts = \App\Models\Post::where('habilitated', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('home', compact('posts'));
    }
}
