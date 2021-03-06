@extends('layouts.app')

@section('content')
{{-- <div class="row"> --}}
    <div class="col-md-10 mx-auto"  >
       <div class="row">
        @foreach ($categories as $category)
        
            <div class="col-md-3" >
                <a href="/category/{{$category->id}}">
                <img class="cat-image" src="/categoryImage/{{$category->id}}" alt="" width="100%">
                <div style="border: solid 2px black">
                    <h3>{{$category->category_name}}</h3>
                <p>{{$category->description}}</p>
                </div>
            </a>
            </div>
        
        
        @endforeach
       </div>
    </div>
    <style>
        .cat-image{
            height: 300px;
        }
    </style>
{{-- </div> --}}

<script src="{{ asset('js/app.js') }}"></script>
@endsection