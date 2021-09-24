@extends('layouts.app')

@section('content')
    <div class="" style="margin-top: -30px">
        <img src="{{ asset('img/recipe.png') }}" width="100%">
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

    <div class="container bg-white pt-5  pb-2 col-md-10 col-lg-8 col-xl-8 col-xs-2 mx-auto rounded border" style="margin-top: 20px">
        <h1 class="" style="color: #49ac39">User Submitted Recipes</h1>
    
        
    
         @if ($posts->count())
            <div class="row">
                @foreach ($posts as $post)
                <div class="mb-2 col-lg-4">
                    
                    @if(!empty($post->images))
                        @foreach ($post->images as $image)
                        <img src="/download/{{$image['id']}}" alt="" width="100%">
                            {{-- <p></p> --}}
                        @endforeach
                    @endif
                    <h3>{{$post->title}}</h3>
                    <p>{{$post->body}}</p>
                    
                    <small>Created by: {{$post->user->username}} - {{$post->created_at->diffForHumans()}}</small>
                    
                    
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

        .border
        {
            border: solid 1px #49ac39 !important;
        }

    
    /* .display-2, .display-4{
        font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;


    } */

    html, body {
        height: 100%;
        widows: 100%;
    }

    .carousel-inner img {
        width: 100%;
        height: 100%;
    }

    .carousel-caption {
        position: absolute;
        top: 60%;
        transform: translateY(-50%);
    }

   .carousel-caption h1 {
       font-size: 500%;
       text-transform: uppercase;
       text-shadow: 1px 1px 15px #000;
   }

    .carousel-caption h3 {
        font-size: 200%;
        font-weight: 500;
        text-shadow: 1px 1px 10px #000;
        padding-bottom: 1rem;
    }
    
    .jumbotron{
        padding: 1rem;
        border-radius: 0;
    }

    .padding {
        padding-bottom: 2rem;
    }

    .welcome{
        width: 75%;
        margin: 0 auto;
        padding-top: 2rem;
    }

    .welcome hr {
        border-top: 2px solid #b4b4b4;
        width: 95%;
        margin-top: .3rem;
        margin-bottom: 1rem;    
    }

    .fa-school, .fa-film, .fa-paint-brush{
        font-size: 4em;
        margin: 1rem;
    }

    .fun{
        width: 100%;
        margin-bottom: 2rem;
    } 

    .social a {
        font-size: 50px;
        padding: 20px;
    }

    /* *****Media Queries**** */
    @media (max-width: 992px)
    {

    }

    @media (max-width: 768px)
    {
        .carousel-caption {
        top: 45%;
    }

   .carousel-caption h1 {
       font-size: 350%;
   }

    .carousel-caption h3 {
        font-size: 200%;
        font-weight: 400;
        text-shadow: 1px 1px 10px #000;
        padding-bottom: .2rem;
    }

    .carousel-caption .btn {
        font-size: 95%;
        padding: 8px 14px;
    }
    }

    @media (max-width: 576px)
    {

    }


    </style>
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script>
         $.ajax({
					url:  "https://api.spoonacular.com/recipes/random?number=10&apiKey=175acb5bb1e7452d8a36bc1615908948",
					type: 'get',
					dataType: 'json',
					data: {_token : "{{ csrf_token() }}", },
					success: function(res) {
						// alert(res.alert)
            // document.location.href = '/'
					}
				})
    </script> --}}
    <script>
        console.log($('exampleModal'))
    </script>
@endsection