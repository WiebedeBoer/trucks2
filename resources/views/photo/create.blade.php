@extends('layouts.archive')
@section('title')
Onserfgoed
@endsection
@section('content')

<form action="photo/create/{{$id}}" method="post" enctype="multipart/form-data">
<label for="file">Bestand:</label>
<input type="file" name="image" id="image" />  <input type="submit" name="submit" value="upload" />
</form>

@endsection