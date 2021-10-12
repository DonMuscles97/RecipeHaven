@extends('layouts.app')

@section('content')
<div class="container bg-white pt-5  pb-2 col-md-10 col-lg-8 col-xl-8 col-xs-2 mx-auto">
    <h1 class="" style="color: #49ac39">Recipes</h1>

    

     @if ($posts->count())
     <div class="row">
        @foreach ($posts as $post)
        <div class="mb-2 col-lg-3">
            <a href="/post/{{$post->id}}">
            @if(!empty($post->images))
                <img src="/download/{{$post->images[0]['id']}}" alt="" width="100%" class="post-image">
            @endif
            <h4>{{$post->title}}</h4>
            {{-- <p>{{$post->body}}</p> --}}
            
            <small>Created by: {{$post->user->username}} - {{$post->created_at->diffForHumans()}}</small>
            </a>
            
        </div>
        @endforeach
    </div>
        <div class="col-md-12">
           {{-- <span>{{$posts->links()}}</span>  --}}
        </div>
     @else
     <p>Go create some recipes!</p>
     @endif
 </div>

<style>
    .btn-green{
        background: #49ac39;
        color: white
    }

    .btn-green:hover{
        background: white;
        border: solid 1px #49ac39;
        color: #49ac39
    }

    .post-image{
            height: 300px;
        }
</style>
<script src="{{ asset('js/app.js') }}"></script>   
@endsection