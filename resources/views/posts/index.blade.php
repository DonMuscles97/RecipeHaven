@extends('layouts.app')

@section('content')
<div class="container bg-white rounded pt-5  pb-2 col-md-10 col-lg-8 col-xl-3 col-xs-2 mx-auto">
    <h1 class="text-primary">Posts</h1>

    <form action="{{route('posts')}}" method="POST">
     @csrf

         <div class="form-group">

             <input type="text" name="title" id="" class="form-control @error('title') border border-danger @enderror" placeholder="Title">
             @error('title')
                <div class="text-danger mt-2">
                    {{$message}}
                </div>
            @enderror
         </div>

         <div class="form-group">

             <textarea name="body" class="form-control @error('body') border border-danger @enderror" id="" cols="30" rows="10" placeholder="write something lit!!!"></textarea>
             @error('body')
             <div class="text-danger mt-2">
                 {{$message}}
             </div>
         @enderror 
         </div>


         <div class="form-group text-right">
             <input type="submit" value="post" class="btn btn-primary">
                      
         </div>

        
     </form>

    
 </div>
@endsection