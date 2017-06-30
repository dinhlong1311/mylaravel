@extends('layouts.master')

@section('content')
  <p style="font-size:0.86em;color:#ff4444;">{{ $error or '' }}</p>
  <form class="" action="{{route('loginAdmin')}}" method="post">
    {{ csrf_field() }}
    <input type="text" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit" name="button" class="btn btn-primary">Login</button>
  </form>
@endsection
