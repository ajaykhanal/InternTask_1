<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customauth;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Models\Post;

class CustomauthController extends Controller
{
    public function index(){
        $all_posts= Post::paginate(2);
        return view('user.index',compact('all_posts'));
    }

    public function detail($id){
        $post= Post::find($id);
        return view('user.detail',compact('post'));
    }

    public function home(){
        if(Session::has('loginId')){
            $log_data= Customauth::where('id', Session::get('loginId'))->first();
        }
        return view('user.home',compact('log_data'));
    }

    public function register(){
        return view('user.register');
    }

    public function register_data(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:customauths',
            'password'=>'required|confirmed',
            
        ]);
        $user= new Customauth();
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= bcrypt($request->password);
        $res= $user->save();
        
        if($res){
            return redirect("/user/login")->with('success', 'Your form has been registered');  
        }else{
            return back()->with('fail','Your form hasnot been registered');
        } 
    }

    public function login(){
        return view('user.login');
    }
    
    public function login_data(Request $request){
              $request->validate([
                'email'=>'required',
                'password'=>'required',
              ]);
            $user= Customauth::where('email',$request->email)->first();
            if($user){
                if(Hash::check($request->password,$user->password)){
                    $request->session()->put('loginId',$user->id);
                    return redirect('/user/home')->with('success','You have been loggedin successfully!!');
                }else{
                    return back()-> with('fail','Invalid Passwords found');
                }
            }else{
                return back()-> with('fail','This email isnot registered');
            }
        }

    public function logout(){
        session()->forget('loginId');
        return redirect('/user/login')->with('success',"You have been loggedout successfully!!");
    }
}
