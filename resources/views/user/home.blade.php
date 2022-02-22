@extends('base')
@section('title','Home')
@section('mainarea')
  <div class="container">
      <h3>Home Page</h3>
      {{-- Name: {{Auth::user()->name}}
      Email: {{Auth::user()->email}} --}}
      <h5>Full Name: {{$log_data->name}}</h5>
      <h5>Email: {{$log_data->email}}</h5>
      <a href="{{route('user.logout')}}" class="btn btn-success">Logout</a>
  </div>
@endsection