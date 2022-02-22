<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Session;

class PostController extends Controller
{
    public function index(){
        $cats= Category::all();
        return view('posts.index',compact('cats'));
    }

    public function add_post(Request $request){
        if($request->hasFile('thumb_image')){
            $image2= $request->file('thumb_image');
            $reThumbImage= time().'.'.$image2->getClientOriginalExtension();
            $dest2= public_path('/imgs');
            $image2->move($dest2,$reThumbImage);
        }else{
            $reThumbImage='na';
        }
        $post= new Post;
        $post->user_id= $request->userid;
        $post->cat_id= $request->category;
        $post->title= $request->title;
        $post->about= $request->detail;
        
        $post->thumb_image= $reThumbImage;
        $post->save();
        return redirect('/post')->with('success',"Post has been added!!");
    }

    public function my_post(Request $request){
        if(Session::has('loginId')){
            $userid= Session::get('loginId');
        }
        $my_posts= Post::where('user_id',$userid)->get();
        
        return view('posts.my_posts',compact('my_posts'));
    }

    public function edit_post($id){
        $post= Post::find($id);
        $cats= Category::all();
        return view('posts.edit_post',['post'=>$post,'cats'=>$cats]);
    }

    public function edit_post_data(Request $request, $id){
        if($request->hasFile('thumb_image')){
            $image2= $request->file('thumb_image');
            $ThumbImage= time().'.'.$image2->getClientOriginalExtension();
            $dest2= public_path('/imgs');
            $image2->move($dest2,$ThumbImage);
        }else{
            $ThumbImage= $request->thumb_image;
        }
        $post= Post::find($id);
        if(Session::has('loginId')){
            $userid= Session::get('loginId');
        }
        $post->user_id= $userid;
        $post->cat_id= $request->category;
        $post->title= $request->title;
        $post->about= $request->about;
       
        $post->thumb_image= $ThumbImage;
       
        $post->save();
        return redirect('/my_posts')->with('success',"Post has been updated!!");
    }

    public function delete_post($id){
        $post= Post::find($id)->delete();
        return redirect('/my_posts')->with('success',"Post has been deleted successfully!!");
    }
}
