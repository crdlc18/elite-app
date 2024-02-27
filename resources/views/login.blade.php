@extends('layout')
@section('title', 'ElitePlayer | Login')
@section('content')

    <div class="container">
        <div class="mt-5">
            @if($errors->any())
                <div class="col-12">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif
            
            @if(session()->has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
        </div>
        <form action="{{route('login.post')}}"method="post" class="mx-auto">
            @csrf
        <h4 class=text-center>Login</h4>
        <div class="mb-3 mt-5 ">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary mt-4">Login</button>
        <p>Don't have an account yet? <a href="{{ route('register')}}">Register now. <a> </p>
        </form>
    </div>

@endsection

