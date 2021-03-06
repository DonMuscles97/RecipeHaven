<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth']);
    // }


    public function index()
    {
        // $post_model = new Post();
        $posts = Post::orderBy('created_at', 'DESC')->limit(3)->get();
        // dd($posts[0]->categories);

        // foreach($posts as $post)
        // {
        //     dd($post->images[0]->id);
        // }

        $categories = Category::all();

        // dd($categories);

        // phpinfo();

        return view('dashboard')->with(['posts' => $posts, 'categories' => $categories]);
    }
}
