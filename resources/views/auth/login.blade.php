@extends('layouts.app')

@section('content')
    <div class="container rounded pt-5 pl-5 pr-5 pb-2 col-md-6 col-lg-4 col-xl-3 col-xs-2 mx-auto" style="background: #c9c2bd">
       <h1 class="text-primary text-green">Login</h1>
        @if (session('status'))
            <div class="alert alert-danger">
                {{session('status')}}
            </div>
        @endif

       <form action="{{route('login')}}" method="POST">
        @csrf

            <div class="form-group">

                <input type="email" name="email" id="" class="form-control @error('email') border border-danger @enderror" placeholder="Email" value="{{old('email')}}">
                @error('email')
                <div class="text-danger mt-2">
                    {{$message}}
                </div>
            @enderror
            </div>

            <div class="form-group">

                <input type="password" name="password" id="password" class="form-control @error('password') border border-danger @enderror" placeholder="Password" >
                @error('password')
                <div class="text-danger mt-2">
                    {{$message}}
                </div>
            @enderror
            </div>


            <div class="form-group text-center">
                <input type="submit" value="Login" class="btn btn-green form-control">
                <div class="mt-3">
                    <input type="checkbox" class="form-check-input" value="true" name="checkbox">
                    <label for="checkbox">Remember Me</label>
                </div>
                <p class="mt-3 text-center">To Create an Account click <a class="link-green" href="{{route('register')}}">here</a></p>
                
            </div>

           
        </form>
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

        .text-green, .link-green{
            color: #49ac39 !important
        }

        .link-green:hover{
            color: #ffffff !important
        }
    </style>
@endsection