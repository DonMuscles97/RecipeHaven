@extends('layouts.app')

@section('content')
<div class="container bg-white rounded pt-5  pb-2 col-md-10 col-lg-8 col-xl-8 col-xs-2 mx-auto" style="border: solid #49ac39 1px">
    <h1 class="" style="color: #49ac39">Create a Category </h1>

    <form action="{{route('createCategory')}}" method="POST">
     @csrf

         <div class="form-group">

             <input type="text" name="category_name" id="" class="form-control @error('category_name') border border-danger @enderror" placeholder="Category Name">
             @error('category_name')
                <div class="text-danger mt-2">
                    {{$message}}
                </div>
            @enderror
         </div>

         <div class="form-group">

             <textarea name="description" class="form-control @error('description') border border-danger @enderror" id="" cols="30" rows="10" placeholder="Category Description goes here"></textarea>
             @error('description')
             <div class="text-danger mt-2">
                 {{$message}}
             </div>
         @enderror 
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
                 <p>A picture is required to create Category</p>
             </div>
         @enderror 

         <div class="form-group text-right">
             <input type="text" id="file_input" style="display: none" name="uploads">
             <input type="submit" value="Save Category" class="btn text-white form-control" style="background: #49ac39;">
                      
         </div>

        
     </form>

    
 </div>
 <script src="{{ asset('js/app.js') }}"></script>   
 <link href="{{  URL::asset('plugins/dropzone/dropzone.min.css') }}" rel="stylesheet">
 {{-- @push('scripts') --}}
 <script src="{{ URL::asset('plugins/dropzone/dropzone.min.js') }}"></script>
 

 <script>


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