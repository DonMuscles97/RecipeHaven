@extends('layouts.app')

@section('content')
    <div class="" style="margin-top: -30px">
        <img src="{{ asset('img/recipe.jpg') }}" width="100%">
        <div class="carousel-caption">
            <h1 class="display-2 text-dark text-left">Recipe Haven</h1>
            <h3 class="text-dark text-left"><strong>For recipes and so much more...</strong></h3>
            <button type="button" class="btn btn-outline-dark btn-lg float-left">More Info</button>
            <a href="/register"><button type="button" class="btn btn-green btn-lg float-left ml-2">Sign Up</button></a>
        </div>
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