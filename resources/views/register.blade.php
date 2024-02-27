@extends('layout')
@section('title', 'ElitePlayer | Registration')
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
        <form method="POST" action="{{route('register.post')}}" class="mx-auto">
            @csrf
        <h4 class=text-center>Create an Account</h4>
        <div class="mb-2 mt-5">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="fname" name="fname">
        </div>
        <div class="mb-2 mt-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lname" name="lname">
        </div>
        <div class="mb-2 mt-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control"  min="18" id="age" name="age">
        </div>
        <div class="mb-2 mt-3">
            <label for="gender" class="form-label">Gender: </label>
            <label><input type="radio"  name="gender" value="male" id="genM" checked> Male</label>
            <label><input type="radio" name="gender" id="genF" value="female" > Female</label>
        </div>
        <div class="mb-2 mt-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="mb-2 mt-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-2">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary mt-4">Register</button>
        <p>Have an account already? <a href="{{route('login')}}"> Login here. <a> </p>
        </form>
    </div>

@endsection

