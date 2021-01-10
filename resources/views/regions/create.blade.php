@extends('layouts.archive')
@section('title')
Onserfgoed
@endsection
@section('content')

<form method="POST" action="/region" class="pb-3">

<p>Naam:</p>
<div class="input-group">
<input type="text" name="region_name" value="{{old('region_name') ?? $region->region_name}}">
</div>
<div>{{$errors->first('region_name')}}</div>

<p>Vlag:</p>
<div class="input-group">
<input type="text" name="flag" value="{{old('flag') ?? $region->flag}}">
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
        <option value="{{ $category->category_id }}" {{ $category->category_id ==$region->category ? 'selected' : '' }}>{{ $category->category_name }}</option>
    @endif 
@endforeach
</select>
</div>
<div>{{$errors->first('category')}}</div>

<p>Behorend tot:</p>
<div class="input-group">
<select name="archive">
<optgroup label="archief">
@foreach($archives as $archive) 
    @if($new_archive ==$category->category_id)
        <option value="{{ $archive->archive_id }}" selected>{{ $archive->archive_name }}</option>
    @else
        <option value="{{ $archive->archive_id }}" {{ $archive->archive_id ==$region->archive ? 'selected' : '' }}>{{ $archive->archive_name }}</option>
    @endif 
@endforeach
</select>
</div>
<div>{{$errors->first('archive')}}</div>

<input type="submit" value="aanmaken" class="btn btn-primary">
@csrf
</form>

@endsection