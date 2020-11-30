@extends('master')
@section('content')
<div clas="container custom-login">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            
            <form action="/register" method="post">
            @csrf
            <div class="form-group">
            @if (session()->has('emailerror'))
                    <span class="text-danger">{{ session()->get('emailerror') }}</span>
                @endif
                <label for="exampleInputEmail1">User Name</label>
                @if ($errors->has('username'))
                    <span class="text-danger">{{ $errors->first('username') }}</span>
                @endif
                <input type="text" name="username"  class="@error('username')is-invalid @enderror form-control"  placeholder="User Name">
            </div>
            <div class="form-group">
                
                <label for="exampleInputEmail1">Email address</label>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <input type="email" name="email" class="@error('email')is-invalid @enderror form-control"  placeholder="Email">
            </div>
            <div class="form-group">
           
                <label for="exampleInputPassword1">Password</label>
                @if ($errors->has('password'))
                     <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <input type="password" name="password" class="@error('password')is-invalid @enderror form-control"  placeholder="Password">
            </div>
            
            <button type="submit" class="btn btn-default">Register</button>
            </form>
        </div>
    </div>
</div>

@endsection