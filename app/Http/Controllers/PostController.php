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
        // dd($this);
        $this->validate($request, [
          
            'title' => 'required',
            'body' => 'required'

        ]);

        $post = $request->user()->posts()->create([
            'title' => $request->title,
            'body'  => $request->body,
        ]);

        // dd();

        foreach(json_decode($request->uploads) as $upload){
            // dd());
            $post->images()->create([
                'path' => $upload->path,
                'file_name' => $upload->file_name,
                'file_type' => \File::extension($upload->file_name),
                'file_number' => $upload->file_number,
                'user_id'   => \Auth::user()->id

            ]);
        }
        

        $file_inputs = [$request->dl_input, $request->s_input, $request->vc_input, $request->file_input, $request->misc_input];
        // dd($file_inputs);
        
    
    
       

        return redirect()->route('posts');
        }

        public function showPosts()
        {
            
            // $posts = Post::orderBy('created_at', 'DESC')->simplePaginate(5);
            $posts = auth()->user()->posts->sortByDesc('created_at');
            // $posts->created_at = date("m/d/y h:iA", strtotime($posts->created_at));
            // dd($posts);
            return view('posts.posts', ['posts' => $posts]);
        }

        
}
