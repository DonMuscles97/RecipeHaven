<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware(['auth']);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        // dd($categories);

        return view('category.index')->with(['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();

        if (!empty($user))
        {
            return view('category.create');
        }
        else
        {
            return view('auth.login');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          
            'category_name' => 'required',
            'description' => 'required',
            'uploads' => 'required'


        ]);

        $category = $request->user()->categories()->create([
            'category_name' => $request->category_name,
            'description'  => $request->description,
            'user_id'   => \Auth::user()->id
        ]);

        

        foreach(json_decode($request->uploads) as $upload){
            
            if (!empty(Storage::disk('public')->exists("{$upload->path}/{$upload->file_name}")))
            {
                // dd('here');
                Storage::disk('public')->move("{$upload->path}/{$upload->file_name}", "category/{$category->id}/{$upload->file_name}");

                    $category->path = "category/$category->id";
                    $category->file_name = $upload->file_name;
                    $category->file_type = \File::extension($upload->file_name);
                    $category->save();
                    

                
            }
            
        }

        return redirect()->route('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        $posts = $category->posts;
        // dd($category);

        return view('category.category')->with(['posts' => $posts, 'category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
