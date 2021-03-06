@extends('layouts.app')

@section('content')
    <div class="" style="margin-top: -30px">
        <img src="{{ asset('img/recipe.png') }}" width="100%" id="main-pic">
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

    <div class="container" style="margin-top: 20px;">
        <div class="col-lg-9 mx-auto">
            <div class="row">
                @foreach ($categories as $category)
            <div class="col-md-2 col-4 text-center">
                <a href="/category/{{$category->id}}" class="text-center">
                    <img src="/categoryImage/{{$category->id}}" alt="" width="100%"  class="text-center cat-image">
                    <p class="text-center">{{$category->category_name}}</p>
                </a>
            </div>
        @endforeach
            </div>
        </div>
    </div>

    <div class="container bg-white pt-5  pb-2 col-md-10 col-lg-10 col-xl-10 col-xs-2 mx-auto rounded border" style="margin-top: 20px">
        <h1 class="" style="color: #49ac39">Recent Recipes!</h1>
    
        
    
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

     <div class="container bg-white pt-5  pb-2 col-md-10 col-lg-10 col-xl-10 col-xs-2 mx-auto rounded border" style="margin-top: 20px">
        <h1 class="" style="color: #49ac39">More Recipes!</h1>
        <div class="row" id="recipes">

        </div>
    
        
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
    @media (max-width: 1024px)
    {
        .carousel-caption {
        top: 50%;
    }
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
        #main-pic {
        /* width: 100%; */
        height: 200px;
    }

        .carousel-caption{
            top: 20%;
            height: 200px;
        }

        .carousel-caption h1 {
            font-size: 250%;
        }

        .carousel-caption h3 {
            font-size: 110%;
        }

        .carousel-caption .btn {
            font-size: 90%;
            padding: 4px 8px;
        }
    }


    </style>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
         $.ajax({
					url:  "https://api.spoonacular.com/recipes/random?number=12&apiKey=175acb5bb1e7452d8a36bc1615908948",
					type: 'get',
					dataType: 'json',
					data: {_token : "{{ csrf_token() }}", },
					success: function(res) {
						res.recipes.forEach((item) => {
                            console.log(item)
                            var recipe = document.createElement('div');
                            recipe.classList.add('mb-2')
                            recipe.classList.add('col-lg-3')
                            var html = 
                                `                                                    
                                    <a href="/externalRecipe/${item.id}">
                                        <img src="${item.image}" alt="" width="100%" class="">                                    
                                        <h4>${item.title}</h4>  
                                    </a>                                                                                                      
                                    
                                    
                                `

                                recipe.innerHTML = html;
                                document.getElementById('recipes').appendChild(recipe);
                        })
					}
				})
    </script>
    <script>
        
    </script>
@endsection