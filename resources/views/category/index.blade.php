@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-10 mx-auto"  >
       <div class="row">
        @foreach ($categories as $category)
        <div class="col-md-3" >
            <img src="/categoryImage/{{$category->id}}" alt="" width="100%">
            <div style="border: solid 2px black">
                <h3>{{$category->category_name}}</h3>
            <p >{{$category->description}}</p>
            </div>
        </div>
        @endforeach
       </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
@endsection