@extends('layouts.app')

@section('content')
<div class="container bg-white rounded pt-5  pb-2 col-md-10 col-lg-8 col-xl-3 col-xs-2 mx-auto">
    <h1 class="text-primary">Posts</h1>

    

     @if ($posts->count())
        @foreach ($posts as $post)
            <div class="bg-info rounded p-3 text-white mb-2">
                <h3>{{$post->title}}</h3>
                <p>{!!html_entity_decode($post->body)!!}</p>
                <div class="row p-2">
                    <div class="m-1">
                        <form action="" method="">
                            @csrf
                            <button  class="btn btn-success" type="submit">{{$post->likes->count()}} {{Str::plural('like', $post->likes->count())}}</button>
                        </form>
                    </div>
                    <div class="m-1">
                        <form action="" method="">
                            @csrf
                            <button  class="btn btn-danger" type="submit">Dis</button>
                        </form>
                    </div>
                </div>
                
                <small>Created by: {{$post->user->username}} - {{$post->created_at->diffForHumans()}}</small>
                
                
            </div>
        @endforeach
        <div class="col-md-12">
           <span>{{$posts->links()}}</span> 
        </div>
     @else
        <p>there are no posts</p>
     @endif
 </div>
@endsection