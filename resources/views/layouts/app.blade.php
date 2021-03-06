<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Recipe Haven</title>
</head>
<body class="top-space bg-light">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      @if (auth()->user())
        <a class="navbar-brand" href="/">RecipeHaven - {{auth()->user()->username}}</a>
      @else
      <a class="navbar-brand" href="/">RecipeHaven</a>
      @endif
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav ml-auto">
            @if (auth()->user())
            <li class="nav-item active">
              <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Create</a>
              <div class="dropdown-menu" aria-labelledby="dropdown03">
                <a class="dropdown-item" href="{{route('createPost')}}">Create Recipe</a>
                <a class="dropdown-item" href="{{route('createCategory')}}">Create Category</a>
                <a class="dropdown-item" href="{{route('categories')}}">Categories</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('posts')}}">My Recipes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="logout" href="#">Logout</a>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link" href="{{route('login')}}">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('register')}}">Register</a>
            </li>
            @endif
            

            
            
          </ul>

        </div>
        
      </nav>
    @yield('content')
    
</body>

<style>

a { color: inherit; } 

    .top-space{
      padding-top: 80px;
    }

    .bg-light{
      background: #ecf0f5 !important;
    }

    .rounded{
      border-radius: 10px !important;
    }
</style>
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
<script>

 
  $('#logout').click(() => {
    $.ajax({
					url:  "/logout",
					type: 'post',
					dataType: 'json',
					data: {_token : "{{ csrf_token() }}", },
					success: function(res) {
						// alert(res.alert)
            document.location.href = '/'
					}
				})
  })
</script>
</html>