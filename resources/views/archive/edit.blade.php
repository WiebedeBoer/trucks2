@extends('layouts.archive')
@section('title')
Onserfgoed - Archief
@endsection
@section('content')

<form method="POST" action="/archive" class="pb-3">
@method('PATCH')

<p>Naam:</p>
<div class="input-group">
<input type="text" name="archive_name" value="{{old('archive_name') ?? $archive->archive_name}}">
</div>
<div>{{$errors->first('archive_name')}}</div>

<p>Vlag:</p>
<div class="input-group">
<input type="text" name="flag" value="{{old('flag') ?? $archive->flag}}">
</div>
<div>{{$errors->first('flag')}}</div>

<p>Soort:</p>
<div class="input-group">
<select name="category">
<optgroup label="soort">
@foreach($categories as $category) 
    @if($new_category ==$category->category_id)
        <option value="{{ $category->category_id }}" selected>{{ $category->category_name }}</option>
    @else
        <option value="{{ $category->category_id }}" {{ $category->category_id ==$archive->category ? 'selected' : '' }}>{{ $category->category_name }}</option>
    @endif 
@endforeach
</select>
</div>
<div>{{$errors->first('category')}}</div>

<input type="submit" value="wijzig" class="btn btn-primary">
@csrf
</form>

@endsection