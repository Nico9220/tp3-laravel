<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller

{
    public function getIndex()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }



    public function getShow($id)
    {
        $post = Post::findOrFail($id); // esto lanza error 404 si no encuentra el id
        return view('category.show', compact('post'));
    }


    public function getCreate()
    {
        $categories = Category::all();
        return view('category.create', compact('categories'));
    }

    public function getEdit($id)
    {
        $post = Post::findOrFail($id);
        return view('category.edit', compact('post'));
    }



    public function postCreate(Request $request)
    {
        if (!Auth::check()) {
            dd('Usuario no logueado');
        }

        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'habilitated' => 'nullable',
        ]);

        $data['habilitated'] = $request->has('habilitated');
        $data['poster'] = Auth::user()->name;

        Post::create($data);

        return redirect('/category/create')->with('success', 'Post creado correctamente.');

    }




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

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/category')->with('success', 'Post eliminado correctamente.');
    }

    public function getByCategory($id)
    {
        $category = Category::with('posts')->findOrFail($id);
        return view('category.byCategory', compact('category'));
    }
}
