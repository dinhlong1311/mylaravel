{{ $error or '' }}
<form class="" action="{{route('loginUser')}}" method="post">
  {{ csrf_field() }}
  <input type="text" name="email" placeholder="Email">
  <input type="password" name="password" placeholder="Password">
  <button type="submit" name="button">Login</button>
</form>
