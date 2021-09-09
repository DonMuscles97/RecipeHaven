@extends('layouts.app')

@section('content')
<div class="container bg-white pt-5  pb-2 col-md-10 col-lg-8 col-xl-8 col-xs-2 mx-auto">
    <h1 class="" style="color: #49ac39">Recipes</h1>

    

     @if ($posts->count())
        @foreach ($posts as $post)
            <div class="mb-2">
                <h3>{{$post->title}}</h3>
                @if(!empty($post->images))
                    @foreach ($post->images as $image)
                    <img src="/download/{{$image['id']}}" alt="" width="100%">
                        {{-- <p></p> --}}
                    @endforeach
                @endif
                <p>{!!html_entity_decode($post->body)!!}</p>
                {{-- <div class="row p-2">
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
                </div> --}}
                
                <small>Created by: {{$post->user->username}} - {{$post->created_at->diffForHumans()}}</small>
                
                
            </div>
        @endforeach
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
</style>
@endsection