@extends('master')
@section('content')
    

<div clas="container custom-login">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div>
                @if (session()->has('error'))
                    <span class="text-danger">{{ session()->get('error') }}</span>
                @endif
            </div>
            
            <form action="/login" method="post" enctype="multipart/form-data">
            <div class="form-group">
                    @csrf
                    <!-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif -->
                <label for="exampleInputEmail1">Email address</label>
                
                <input type="text" name="email" class="form-control"  placeholder="Email">
            </div>
            <div class="form-group">
                    
                <label for="exampleInputPassword1">Password</label>
                
                <input type="password" name="password" class="form-control"  placeholder="Password">
            </div>
            
            
            <button type="submit" class="btn btn-default">Login</button>
            </form>
        </div>
    </div>
</div>

@endsection