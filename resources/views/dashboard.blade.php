@extends('layouts.app')

@section('content')
    <div class="" style="margin-top: -30px">
        <img src="{{ asset('img/recipe.jpg') }}" width="100%">
        <div class="carousel-caption">
            <h1 class="display-2 text-dark text-left">Recipe Haven</h1>
            <h3 class="text-dark text-left"><strong>For recipes and so much more...</strong></h3>
            <button type="button" class="btn btn-outline-dark btn-lg float-left" data-toggle="modal" data-target="#exampleModal">More Info</button>
            
            @if (auth()->user())
                <a href="/createPost"><button type="button" class="btn btn-green btn-lg float-left ml-2">Post Recipe</button></a>
            @else
            <a href="{{route('register')}}"><button type="button" class="btn btn-green btn-lg float-left ml-2">Sign Up</button></a>
            @endif
        </div>

        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">More Info</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Thank you for visiting Recipe Haven. Feel free to explore the site and find a Recipe that suits you.</p>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>
    </div>

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
               <span>{{$posts->links()}}</span> 
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