<form class="" action="{{route('postForm')}}" method="post">
  {{ csrf_field() }}
  <input type="text" name="user" placeholder="User">
  <input type="password" name="pass" placeholder="Password">
  <input type="submit" value="OK">
</form>
