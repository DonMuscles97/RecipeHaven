@extends('layouts.app')

@section('content')
<div id="outer">
    <div id="inner">
        <div class="row">
            <div class="col-md-6">
                <img src="/download/{{$post->images[0]->id}}" alt="" width="100%" id="head-image">
                @foreach ($post->images as $image)
                    <img src="/download/{{$image->id}}" alt="" class="image">
                @endforeach
            </div>
            <div class="col-md-6">
                <h3 style="margin-top: 50px">{{$post->title}}</h3>
                <p>{{$post->body}}</p>
                <h4>Ingredients</h4>
                <ul>
                    @foreach (json_decode($post->ingredients) as $ingredient)
                        <li>{{$ingredient}}</li>
                    @endforeach
                </ul>
                <hr>
                <h4>Instructions</h4>
                <ol>
                    @foreach (json_decode($post->instructions) as $instruction)
                        <li>{{$instruction}}</li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>

<style>
    #inner{
        margin: 0 auto;
        width: 70%;
        /* border: solid black 1px; */
    }

    .image{
        width: 100px;
        height: 100px;
        object-fit: cover;
        cursor: pointer;
    }

    #head-image{
        border: solid 1px #eee; 
        padding: 10px;
        width: 400px;
        height: 400px;
        object-fit: cover;
    }
</style>

<script src="{{ asset('js/app.js') }}"></script>

<script>
    $('.image').click((e) => {
        var str = e.target.src
        var num = /[^/]*$/.exec(str)[0];

        document.getElementById('head-image').src = `/download/${num}`

        console.log(num)
        console.log()
    })
</script>
@endsection