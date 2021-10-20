@extends('layouts.app')

@section('content')
<input type="text" name="" id="recipe_id" style="display: none" value="{{$id}}">
<div id="outer">
    <div id="inner">
        
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
        /* width: 400px;
        height: 400px; */
        object-fit: cover;
    }
</style>

<script src="{{ asset('js/app.js') }}"></script>

<script>
    var id = document.getElementById('recipe_id').value;
    $.ajax({
               url:  `https://api.spoonacular.com/recipes/${id}/information?apiKey=175acb5bb1e7452d8a36bc1615908948`,
               type: 'get',
               dataType: 'json',
               data: {_token : "{{ csrf_token() }}", },
               success: function(res) {
                    console.log(res);
                    var recipe = document.createElement('div')
                    recipe.classList.add('row')

                    var html = 
                    `
                    <div class="row">
                        <div class="col-md-6">
                            <img src="${res.image}" alt="" width="100%" id="head-image">   
                            <hr>
                            <h4>Ingredients</h4>
                            <ul>`
                                res.extendedIngredients.forEach((item) => {
                                    html += `<li>${item.original}</li>`
                                })
                            html += `
                            </ul>                                
                        </div>
                        <div class="col-md-6">
                            <h3 style="margin-top: 50px">${res.title}</h3>
                            <p>${res.summary}</p>
                            <h4>Instructions</h4>
                            <p>${res.instructions}</p>                         
                            
                            
                        </div>
                    </div>
                    `
                    recipe.innerHTML = html
                    document.getElementById('inner').appendChild(recipe)
               }
           })
</script>
@endsection