@extends('layouts.master');

@section('content')
  @foreach ($users as $user)
    <p>{{$user->name}}</p>
    <p>{{$user->email}}</p>
    <hr>
  @endforeach
  {!! $users->links() !!}
@endsection
