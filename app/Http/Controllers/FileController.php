<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\File;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Response;

class FileController extends Controller
{
    public function download(Request $request, $id)
    {
        $file = PostImage::find($id);
        // dd($file);

        if(isset($file))
        {
            // check two file paths
            // dd($file);
            
            if (Storage::disk('public')->exists("$file->path/$file->file_name")) 
            {
                // dd('we are here');
                $localFileStorePath = "$file->path/$file->file_name";

                $contents = Storage::disk('public')->get($localFileStorePath);

                return Response::make($contents, 200, [
                    'Content-Type' => "application/{$file->file_type}",
                    'Content-Disposition' => 'inline; filename="'.basename($localFileStorePath).'"'
                ]);
            }          
        }
    }

    public function CategoryImage(Request $request, $id)
    {
        $file = Category::find($id);
        // dd($file);

        if(isset($file))
        {
            // check two file paths
            // dd($file);
            
            if (Storage::disk('public')->exists("$file->path/$file->file_name")) 
            {
                // dd('we are here');
                $localFileStorePath = "$file->path/$file->file_name";

                $contents = Storage::disk('public')->get($localFileStorePath);

                return Response::make($contents, 200, [
                    'Content-Type' => "application/{$file->file_type}",
                    'Content-Disposition' => 'inline; filename="'.basename($localFileStorePath).'"'
                ]);
            }          
        }
    }

    public function TempUpload(Request $request)
    {
        //  dd($request->files);

         foreach($request->files as $file)
         {
             $input_name = key($request->file());
         }
 
        //  dd($input_name);
 
         $upload = $request->file($input_name);
 
        //  dd($upload);
 
         
         
         // checks whether or not the temporary upload is a license check or statement
            
             
             $file_name = $upload->getClientOriginalName();            
             $file_name = time() . '_' . $file_name;     
             $file = \File::get($upload->getRealPath());
            //  dd($file);
             $path = 'posts/temp';
 
             
 
             
 
             Storage::disk('public')->put("{$path}/{$file_name}", $file);
             
             
 
 
             
 
                 
 
             return response()->json(['path'=> $path, 'file_name'=> $file_name, 'input_name' => $input_name]);
 
    }
    
}
