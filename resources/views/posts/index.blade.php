@extends('layouts.app')

@section('content')
<div class="container bg-white rounded pt-5  pb-2 col-md-10 col-lg-8 col-xl-8 col-xs-2 mx-auto" style="border: solid #49ac39 1px">
    <h1 class="" style="color: #49ac39">Create Recipe</h1>

    <form action="{{route('posts')}}" method="POST">
     @csrf

        <div class="form-group">
            <select name="categories[]" id="" class="form-control chosen-select" multiple data-placeholder="Select a Category">
                {{-- <option value="">--Select Recipe Categories--</option> --}}
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
            </select>
        </div>
         <div class="form-group">            
             <input type="text" name="title" id="" class="form-control @error('title') border border-danger @enderror" placeholder="Title">
             @error('title')
                <div class="text-danger mt-2">
                    {{$message}}
                </div>
            @enderror
         </div>

         <div class="form-group">

             <textarea name="body" class="form-control @error('body') border border-danger @enderror" id="" cols="30" rows="10" placeholder="write something lit!!!"></textarea>
             @error('body')
             <div class="text-danger mt-2">
                 {{$message}}
             </div>
         @enderror 
         </div>
         <div class="form-group">
             <h3>Instructions</h3>
             <div id="instructions">
                 <div class="row">
                     <div class="col-md-1" style="text-align: right">
                         <p>1. </p>
                     </div>
                     <div class="col-md-10">
                        <input type="text" class="form-control" name="instructions[]">
                    </div>
                    <div class="col-md-1">
                        <span class="material-icons-outlined">
                            add_circle_outline
                            </span>
                    </div>
                 </div>
             </div>

         </div>
         <div id="upload" class="dropzone filedrop @error('uploads') border border-danger @enderror">
            {{csrf_field()}}
            <div class="dz-default dz-message">
                <div class="dz-icon">
                    <i class="demo-pli-upload-to-cloud icon-5x"></i>
                </div> 
                <div>   
                    <span class="dz-text">Drop files to upload</span>
                    <p class="text-sm text-muted">or click to pick manually</p>
                </div>
            </div>   
            <div class="fallback">
                <input name="temp" type="file" multiple>
            </div>
        </div>
        @error('uploads')
             <div class="text-danger mt-2">
                 Please upload an Image
             </div>
         @enderror 


         <div class="form-group text-right">
             <input type="text" id="file_input" style="display: none" name="uploads">
             <input type="submit" value="Submit Recipe" class="btn text-white form-control" style="background: #49ac39;">
                      
         </div>

        
     </form>

    
 </div>
 <script src="{{ asset('js/app.js') }}"></script>   
 <link href="{{  URL::asset('plugins/dropzone/dropzone.min.css') }}" rel="stylesheet">
 <link href="{{  URL::asset('plugins/chosen/chosen.min.css') }}" rel="stylesheet">
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 {{-- @push('scripts') --}}
 <script src="{{ URL::asset('plugins/dropzone/dropzone.min.js') }}"></script>
 <script src="{{ URL::asset('plugins/chosen/chosen.jquery.js') }}"></script>
 

 <script>

$(".chosen-select").chosen(); 

console.log($('#upload'))
var upload_number = 0;
var uploads = [];
$("div#upload").dropzone({ 
  url: "/temp", 
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  maxFilesize: 3,
        init: function(e) {
			
            this.on("success", function(file, response) {

                upload_number++
                response.file_number = upload_number
                uploads.push(response)
                document.getElementById('file_input').value = JSON.stringify(uploads)
                console.log(uploads)

			})
		}
    }
      )
 </script>
  {{-- @endpush --}}
@endsection