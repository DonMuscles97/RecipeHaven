@extends('layouts.app')

@section('content')
    <div class="container rounded p-4 col-md-6 col-lg-4 col-xl-3 col-sm-1 mx-auto" style="background: #c9c2bd">
       <h1 class="text-green">New User</h1>
       <form action="{{route('register')}}" method="POST">
        @csrf
            <div class="form-group">
                
                <input type="text" name="name" id="" class="form-control @error('name') border border-danger @enderror" placeholder="Name" value="{{old('name')}}">
                @error('name')
                    <div class="text-danger mt-2">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="form-group">

                <input type="text" name="username" id="" class="form-control @error('username') border border-danger @enderror" placeholder="Username" value="{{old('username')}}">
                    @error('username')
                        <div class="text-danger mt-2">
                            {{$message}}
                        </div>
                    @enderror
            </div>

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

            <div class="form-group">

                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') border border-danger @enderror" placeholder="Confirm Password">
                @error('password_confirmation')
                <div class="text-danger mt-2">
                    {{$message}}
                </div>
            @enderror
               
            </div>

            <div class="form-group">
                <input type="submit" value="Create Account" class="btn btn-green form-control">
                <p class="mt-3 text-center">Already have an account? <a class="link-green" href="{{route('login')}}">here</a> to login</p>
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