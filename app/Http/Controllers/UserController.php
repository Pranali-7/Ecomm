<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Toastr;

class UserController extends Controller
{
    public function login(Request $req)
    {
       
            // $rules=[
            //     'username'=>'required|email',
            //     'password'=>'required',
            // ];
            // $customMessage=[
            //     'username.required'=>"Email Required",
            //     'username.email'=>"Valid Email Required",
            //     'password.required'=>"Password Required",
            // ];

            // $this->validate($req,$rules,$customMessage);

            $user =User::where(['email'=>$req->email])->first();
            if(!$user || !Hash::check($req->password,$user->password))
            {
                return back()->with('error',"Username and Password Not Matched");
            }
            else
            {
                $req->session()->put('user',$user);
                // return redirect('/')->with('loginMessage',"Logged In SUccessFully");
                Toastr::success('Logged In Successfully ','success');
                return redirect('/');
            }
        
        }

    function register(Request $req)
    {
        

        $req->validate([
            'username'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:4|max:8'
        ]);
        
        $user =User::where(['email'=>$req->email])->first();
        if(!$user)
        {
                $user= new User;
                $user->name=$req->username;
                $user->email=$req->email;
                $user->password=Hash::make($req->password);
                $user->save();
                Toastr::success('Registered Succesfully Please Login ','success');
                return view('/login');
        }
        else
        {
            return back()->with('emailerror',"Email Already Exist");
        }
                
                
    }


}
