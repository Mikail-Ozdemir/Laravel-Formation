<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        Post::find(12);

        $post->delete();
        dd('supprimer')

        $posts = Post::orderBy('title')->take(3)->get();

        return view('articles', [
            'posts' => $posts
        ]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        //$post = Post::where('title', 'Aut aperiam similique quia cumque laboriosam.')->first();


      return view('article', [
       'post' => $post
      ]);
    }

    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        Post::create([
            'title' => $request->title,
            'content' => $request->content
        ]);


       dd('post créé');
    }

    public function contact()
    {
        return view('contact');
    }
}
