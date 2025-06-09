<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class HomeController extends Controller
{
    public function getHome(Request $request)
{
    $query = Post::where('habilitated', true);

    if ($request->filled('category')) {
        $query->where('category_id', $request->input('category'));
    }

    if ($request->filled('search')) {
        $search = $request->input('search');
        $query->where('title', 'like', "%{$search}%");
    }

    $posts = $query->orderBy('created_at', 'desc')->get();
    $categories = \App\Models\Category::all();

    return view('home', compact('posts', 'categories'));
}

}

