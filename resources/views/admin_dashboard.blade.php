@extends('layouts.master')

@section('content')
  <h1>Admin Dashboard</h1>
  <p>Name: {{Auth::guard('web_admin')->user()->name}}</p>
  <p>Email: {{Auth::guard('web_admin')->user()->email}}</p>
@endsection
