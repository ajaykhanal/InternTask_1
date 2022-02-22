@extends('base')
@section('title','Index')
@section('mainarea')
   {{-- <div class="container col-md-6 my-3">
    @foreach($all_posts as $pos)
    <div class=" card col-md-6 col-lg-7 col-sm-6 col-xs-12">
            <img class="rounded" src="{{asset('imgs/'.$pos->thumb_image)}}" height="200px" width="800px" >
            <div class="card-body">
            <h5 class="card-title">{{$pos->title}}</h5>
            <p class="card-text">{{$pos->about}}</p>
            <a href="#" class="btn btn-primary">View Details</a>
            </div>
        </div>
    @endforeach
   </div> --}}







   
<div class="jumbotron container my-4">
   <h3>All Posts</h3>
    <table class="table table-bordered table-hovered table-striped">
        <thead>
           <tr>
               <th>Title</th>
               <th>About</th>
               {{-- <th>Category</th> --}}
               <th>Post Image</th>
              
           </tr>
        </thead>
        <tbody>
            @foreach($all_posts as $pos)
            <tr>
                <td><a href="{{route('detail',$pos->id)}}">{{$pos->title}}</a></td>
                <td>{{$pos->about}}</td>
                {{-- <td>{{$pos->category->title}}</td> --}}
                <td><img src="{{asset('imgs/'.$pos->thumb_image)}}" height="70px" weight="70px"></td>
                
            </tr>
            @endforeach
            {{-- @if(!$my_posts)
               <p>No any Posts yet</p>
            @endif --}}
        <tbody>
            
   </table>
   {!! $all_posts->links() !!}
  </div>
@endsection