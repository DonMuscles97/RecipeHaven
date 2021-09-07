<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        
       
        return view('posts.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
          
            'title' => 'required',
            'body' => 'required'

        ]);

        $request->user()->posts()->create([
            'title' => $request->title,
            'body'  => $request->body,
        ]);

        return redirect()->route('posts');
        }

        public function showPosts()
        {
            
            $posts = Post::orderBy('created_at', 'DESC')->simplePaginate(5);
            // dd(count($posts))
            // $posts->created_at = date("m/d/y h:iA", strtotime($posts->created_at));
            // dd($posts);
            return view('posts.posts', ['posts' => $posts]);
        }

        
}
