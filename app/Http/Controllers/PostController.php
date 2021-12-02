<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Video;
use App\Rules\Uppercase;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $video = Video::find(1);

        return view('articles', [
            'posts' => $posts,
            'video' => $video
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
        //$request->validate([
        //    'title'=> ['required', 'max:255', 'min:5', 'unique:posts', new Uppercase],
        //    'content'=> ['required']
        //]);

        $filename = time() . '.' . $request->avatar->extension();

        $path = $request->file('avatar')->storeAs(
            'avatars',
            $filename,
            'public'
        );

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        $image = new Image();
        $image->path = $path;

        $post->image()->save($image);

       dd('post créé');
    }

    public function contact()
    {
        return view('contact');
    }

    public function register()
    {
      $post = Post::find(11);
      $video = Video::find(1);

      $comment1 = new Comment(['content' => 'Mon premier commentaire']);
      $comment2 = new Comment(['content' => 'Mon deuxième commentaire']);
      $post->comments()->saveMany([
          $comment1,
          $comment2
      ]);
      $comment3 = new Comment(['content' => 'Mon troisième commentaire']);
      $video->comments()->save($comment3);
    }
}
