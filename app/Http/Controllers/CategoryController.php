<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getIndex()
    {
        $posts = Post::all();
        return view('category.index', compact('posts'));
    }

    public function getShow($id)
    {
        $post = Post::findOrFail($id); // esto lanza error 404 si no encuentra el id
        return view('category.show', compact('post'));
    }


    public function getCreate()
    {
        return view('category.create');
    }

    public function getEdit($id)
    {
        $post = Post::findOrFail($id);
        return view('category.edit', compact('post'));
    }

    // public function putEdit(Request $request, $id)
    // {

    //     $post = Post::findOrFail($id);

    //     $validated = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'poster' => 'required|string|max:255',
    //         'content' => 'required|string',
    //         'habilitated' => 'nullable|boolean',
    //     ]);

    //     $validated['habilitated'] = $request->has('habilitated');

    //     dd($validated);

    //     $post->update($validated);

    //     return redirect('/category/show/' . $post->id)->with('success', 'Post actualizado correctamente.');
    // }
    public function putEdit(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $post->title = $request->input('title');
        $post->poster = $request->input('poster');
        $post->content = $request->input('content');
        $post->habilitated = $request->has('habilitated'); // checkbox

        $post->save();

        return redirect('/category/show/' . $post->id)->with('success', 'Post actualizado.');
    }
}
