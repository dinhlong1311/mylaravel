<form action="{{route('postFile')}}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <input type="file" name="myFile" >
  <input type="submit" value="Submit">
</form>
