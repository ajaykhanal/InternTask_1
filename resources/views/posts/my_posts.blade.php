@extends('base')
@section('title','Todo Page')
@section('mainarea')

    
    <div class="container my-3">
    <h4>My Posts</h4><hr>
    <?php  
               
                if(session()->has('loginId')){
                    $user_id= Session::get('loginId');
                    // echo $user_id;
                   
                }
            ?>

    <table class="table table-bordered table-striped">
         <thead>
            <tr>
                <th>Title</th>
                <th>About</th>
                
                
                <th>Post Image</th>
                <th>Actions</th>
            </tr>
         </thead>
         <tbody>
             @foreach($my_posts as $pos)
             <tr>
                 <td>{{$pos->title}}</td>
                 <td>{{$pos->about}}</td>
                
                 <td><img src="{{asset('imgs/'.$pos->thumb_image)}}" height="70px" weight="70px"></td>
                 <td><a href="{{route('edit_post',$pos->id)}}" class="btn btn-success">Edit</a>
                      <a href="{{route('delete_post',$pos->id)}}" class="btn btn-danger">Delete</a>
                 </td>
             </tr>
             @endforeach
           
         <tbody>
             
    </table>
    <a href="post" class="btn btn-success">Add Post</a>
    
@endsection