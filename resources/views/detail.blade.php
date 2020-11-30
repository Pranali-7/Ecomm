@extends('master')
@section('content')
<div clas="container ">
    <div class="row">
        <div class="col-sm-6"> 
            <img clas="detail-img" src="{{$product['gallery']}}">
        </div> 
        
        @if(session()->has('addcarterror'))
        <div class="alert alert-sm alert-danger alert-block" role="alert">
            <button type="button" class="close" data-dismiss="alert" arai-label="Close">
            <span aria-hidden="true"></span>
            </button>
            <strong>{{session()->get('addcarterror')}}</strong>
        </div>
            
       
        @endif
        <div class="col-sm-6"> 
        <a href="/">Go Back</a>
        <h2>{{$product['name']}}</h2>
        <h3>Price: {{$product['price']}}</h3>
        <h4>Details: {{$product['description']}}</h4>
        <h4>Category: {{$product['category']}}</h4>
        <br><br>
        
        <form action="/add_to_cart" method="POST">
            @csrf
        <input type="hidden" name="product_id" value="{{$product['id']}}">
        <input type="hidden" name="price" value="{{$product['price']}}">
        <button class="btn btn-primary">Add To Cart</button>
        </form>
        
        
        </div> 
    </div>
</div>
@endsection