@extends('layouts.archive')
@section('title')
Onserfgoed - Zoeken
@endsection
@section('content')

<form method="POST" action="search">

<p>Zoeken:</p>
<div class="input-group">
<select name="archive">
<optgroup label="archief">
@foreach($archives as $archive) 
        <option value="{{ $archive->archive_id }}" selected>{{ $archive->archive_name }}</option>
@endforeach
</select>
</div>
<div>{{$errors->first('archive')}}</div>

@csrf
</form>

@endsection