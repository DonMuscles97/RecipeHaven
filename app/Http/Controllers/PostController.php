<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth']);
    // }

    public function index()
    {

        $user = auth()->user();

        if (!empty($user))
        {
            $categories = Category::all();
            return view('posts.index')->with(['categories' => $categories]);
        }
        else
        {
            return view('auth.login');
        }
        
        // dd($categories);
       
        
    }

    public function store(Request $request)
    {
        // dd($request);

        $instructions = json_encode($request->instructions);
        $ingredients = json_encode($request->ingredients);

        // dd($instructions);
        $this->validate($request, [
          
            'title' => 'required',
            'body' => 'required',
            'instructions' => 'required',
            'ingredients' => 'required',
            'uploads' => 'required'


        ]);

        $post = $request->user()->posts()->create([
            'title' => $request->title,
            'body'  => $request->body,
            'instructions' => $instructions,
            'ingredients' => $ingredients
        ]);

        foreach($request->categories as $category)
        {
            
            $post->categories()->attach($post->id, [
                
                'category_id' => $category
            ]);
            
        }

        

        

        foreach(json_decode($request->uploads) as $upload){
            
            if (!empty(Storage::disk('public')->exists("{$upload->path}/{$upload->file_name}")))
            {
                // dd('here');
                Storage::disk('public')->move("{$upload->path}/{$upload->file_name}", "posts/{$post->id}/{$upload->file_name}");

                $post->images()->create([
                    'path' => "posts/$post->id",
                    'file_name' => $upload->file_name,
                    'file_type' => \File::extension($upload->file_name),
                    'file_number' => $upload->file_number,
                    'user_id'   => \Auth::user()->id

                ]);
            }
            
        }
        

        $file_inputs = [$request->dl_input, $request->s_input, $request->vc_input, $request->file_input, $request->misc_input];
        // dd($file_inputs);
        
    
    
       

        return redirect()->route('posts');
        }

        public function showPosts()
        {                       

            $user = auth()->user();

            if (!empty($user))
            {
                 // $posts = Post::orderBy('created_at', 'DESC')->simplePaginate(5);
            $posts = auth()->user()->posts->sortByDesc('created_at');
            // $posts->created_at = date("m/d/y h:iA", strtotime($posts->created_at));
            // dd($posts);
            return view('posts.posts', ['posts' => $posts]);
            }
            else
            {
                return view('auth.login');
            }
        }

        public function Post($id)
        {
            $post = Post::find($id);
            // dd($post);

            return view('posts.post')->with(['post' => $post]);
        }

        public function ExternalRecipe($id)
        {
            // dd($id);

            return view('posts.external')->with(['id' => $id]);
        }

        
}
