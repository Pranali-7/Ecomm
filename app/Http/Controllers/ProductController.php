<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    
    function index()
    
    {
        $data= Product::all();

        return view('product',['products'=>$data]);
    }
    function detail($id)
    {
        $data= Product::find($id);
        return view('detail',['product'=>$data]);
    }
    function search(Request $req)
    {
        
         $data= Product::where('name','like','%'.$req->input('query').'%')->get();

         return view('search',['products'=>$data]);
    }
    function addToCart(Request $req)
    {
        if($req->session()->has('user'))
        {
            $prod_id= $req->product_id;
            $user_id= $req->session()->get('user')['id'];
            $cart=Cart::where('product_id',$prod_id)
            ->where('user_id',$user_id)
            ->count();
            // $cart=Cart::where(['product_id','=',$prod_id],
            //                  ['user_id','=',$user_id])->count();
            if($cart==0)
            {
                $cart= new Cart;
                $cart->user_id= $req->session()->get('user')['id'];
                $cart->product_id=$req->product_id;
                $cart->quantity=1;
                $cart->price=$req->price;
                $cart->totalprice=$req->price;
                $cart->save();
                return redirect('/');
            }
            else
            {
                return  back()->with("addcarterror","Item Already Exist");
            }
            
        }
        else
        {
            return redirect('/login');
        }
        
    }
    static function cartItem()
    {
        $userId= Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();
    }
    function cartlist()
    {
        $userId= Session::get('user')['id'];
        $products= DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id','cart.quantity','cart.totalprice')
        ->get();
        return view('cartlist',['products'=>$products]);
    }
    function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }
    function orderNow()
    {
        $userId= Session::get('user')['id'];
        $total=  DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->sum('cart.totalprice');   

        return view('ordernow',['total'=>$total]);
    }
    function orderPlace(Request $req)
    {

        $userId= Session::get('user')['id'];
        $allCart= Cart::where('user_id',$userId)->get();
        $req->validate([
            'address'=>'required',
            'Payment'=>'required'

        ]);

        foreach($allCart as $cart)
        {
            $order= new Order;
            $order->product_id= $cart['product_id'];
            $order->user_id= $cart['user_id'];
            $order->status= 'pending';
            $order->payment_method= $req->Payment;
            $order->payment_status= 'pending';
            $order->address= $req->address;
            $order->save();
            Cart::where('user_id',$userId)->delete();

        }
        // $req->input();
        return redirect('/');
    }
    function myOrders()
    {
        $userId= Session::get('user')['id'];
        $orders=  DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->where('orders.user_id',$userId)
        ->get();   

        return view('myorders',['orders'=>$orders]);
    }
    function updateCartQuantity($id,$quantity)
    {
        DB::table('cart')->where('id',$id)->increment('quantity',$quantity);

        $Cart= Cart::where('id',$id)->first();
        // $cart= DB::table('cart')->where('id',$id)->get();

        $total =  $Cart->price * $Cart->quantity ;
        Cart::where('id',$id)->update(['totalprice'=>$total]);

        
        return redirect('/cartlist')->with('flas_message_success',"Product quantity has been updated successfully");
    }
}
