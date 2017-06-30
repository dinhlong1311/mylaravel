<h1>Bạn đã đăng nhập thành công</h1>
@if(isset($user))
  <p>Name: {{$user->name}}</p>
  <p>Email: {{$user->email}}</p>
@endif
