@extends('layouts.app')

@section('content')
<div class="container bg-white pt-5  pb-2 col-md-10 col-lg-10 col-xl-10 col-xs-2 mx-auto rounded border" style="margin-top: 20px">
    <h1 class="" style="color: #49ac39">{{$category->category_name}} recipes</h1>

    

     @if ($posts->count())
        <div class="row">
            @foreach ($posts as $post)
            <div class="mb-2 col-lg-4">
                
               <a href="/post/{{$post->id}}">
                @if(!empty($post->images))
                <img src="/download/{{$post->images[0]['id']}}" alt="" width="100%" class="post-image">
                @endif
                <h3>{{$post->title}}</h3>
                <p>{{$post->body}}</p>
                </a>
                
                <small>Created by: {{$post->user->username}} - {{$post->created_at->diffForHumans()}}</small>
                
                
            </div>
        @endforeach
        </div>
        <div class="col-md-12">
           {{-- <span>{{$posts->links()}}</span>  --}}
        </div>
     @else
        <p>There are currently no recipes in this category</p>
     @endif
 </div>

<style>

    .post-image{
        height: 300px;
    }

    .cat-image{
        width: 100px;
        height: 100px;
        border-radius: 50px;
        text-align: center !important;
        margin: 0 auto !important;
        object-fit: cover
    }

    .btn-green{
        background: #49ac39;
        color: white
    }

    .btn-green:hover{
        background: white;
        border: solid 1px #49ac39;
        color: #49ac39
    }

    .border
    {
        border: solid 1px #49ac39 !important;
    }
</style>
<script src="{{ asset('js/app.js') }}"></script>   
@endsection