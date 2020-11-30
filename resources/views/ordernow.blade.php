@extends('master')
@section('content')
<div clas="custom-product">
    <div class="col-sm-10"> 
        <table class="table">
        
        <tbody>
        <tr>
            <td>Amoount</td>
            <td>$ {{$total}}</td>
        
        </tr>
        <tr>
            <td>Tax</td>
            <td>$ 0</td>
            
        </tr>
        <tr>
            <td>Delivery charges</td>
            <td>$ 10</td>
        
        </tr>
        <tr>
            <td>Total Amount</td>
            <td>${{$total+10}}</td>
            
        </tr>
        </tbody>
    </table>
    <div>
            <form action="/orderplace" method="POST">
                @csrf
                    <div class="form-group">
                    @if ($errors->has('address'))
                     <span class="text-danger">{{ $errors->first('address') }}</span>
                    @endif
                        <textarea name="address" class="form-control" placeholder="Enter address"></textarea>
                    </div>
                    <div class="form-group">
                    @if ($errors->has('Payment'))
                     <span class="text-danger">{{ $errors->first('Payment') }}</span>
                    @endif
                        <label >Payment Method:</label><br><br>
                        <input type="radio" value="cash" name="Payment"><span>Online Payment</span><br><br>
                        <input type="radio" value="cash" name="Payment"><span>EMI Payment</span><br><br>
                        <input type="radio" value="cash" name="Payment"><span>Cash On Delivery</span>
                    </div>
                    
                    <button type="submit" class="btn btn-default">Order Now</button>
                </form>
    </div>
    <div>
</div>
@endsection