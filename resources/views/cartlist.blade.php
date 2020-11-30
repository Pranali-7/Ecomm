@extends('master')
@section('content')
<div clas="custom-product">
    <div class="col-sm-10"> 
        @if(Session::has('flas_message_success'))
        <div class="alert alert-sm alert-danger alert-block" role="alert">
            <button type="button" class="close" data-dismiss="alert" arai-label="Close">
            <span aria-hidden="true"></span>
            </button>
            <strong>{!! session('flas_message_success') !!}</strong>
        </div>
        @endif
        <div class="trending-wrapper">
                <h4>Result For Products</h4>
                <a href="ordernow" class="btn btn-success">Order Now</a><br><br>
                @if(count($products) > 0)
                    

                @foreach ($products as $item)
                <div class="row searched-item cart-list-devider">
                    <div class="col-sm-3">
                        <a href="detail/{{$item->id}}">
                        <img class="trending-image" src="{{$item->gallery}}">
                        
                        </a>
                    </div>
                    <div class="col-sm-4">
                        
                        <div class="">
                        <h2>{{$item->name}}</h2>
                        <h5>{{$item->description}}</h5>
                    </div>
                    <div>
                    <a href="updateqty/{{$item->cart_id}}/1" style="font-size:25px;">+</a> 
                    <input type="text" style="width:10%;" value="{{$item->quantity}}">
                    @if($item->quantity>1)
                    <a href="updateqty/{{$item->cart_id}}/-1" style="font-size:25px;">-</a>
                    @endif
                    <h4>{{$item->totalprice}}</h4>
                    </div>
                    </div>
                    <div class="col-sm-3">
                        <a  href="/removecart/{{$item->cart_id}}" class="btn btn-warning">Remove From cart</a>
                    </div>
                </div>
            @endforeach
            @else
            <h2>{{'Cart is Empty'}}</h2>
            @endif

        </div>
        <a href="ordernow" class="btn btn-success">Order Now</a><br><br>
    
</div>
@endsection