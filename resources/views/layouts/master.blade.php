<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Học Laravel căn bản</title>
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css"> -->
  <!-- Bootstrap core CSS -->
  <link type="text/css" href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link type="text/css" href="{{ asset('public/css/mdb.min.css') }}" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <!-- <link href="css/style.css" rel="stylesheet"> -->
</head>

<body>
  @include('layouts.header')

  <!-- /Start your project here-->
	<div class="container">
		@yield('content')
	</div>

  <div class="container">
    @include('layouts.footer')
  </div>
</body>
</html>
