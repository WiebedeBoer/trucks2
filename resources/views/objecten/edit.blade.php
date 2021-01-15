@extends('layouts.archive')
@section('title')
Onserfgoed
@endsection
@section('content')

@include('objecten.breadcrumb')

<form method="POST" action="/objecten/{{ $truck->truck_id }}" class="pb-3">
@method('PATCH')

<p>Naam:</p>
<div class="input-group">
<input type="text" name="truck_name" value="{{old('truck_name') ?? $truck->truck_name}}">
</div>
<div>{{$errors->first('truck_name')}}</div>

<p>Vlag:</p>
<div class="input-group">
<input type="text" name="flag" value="{{old('flag') ?? $truck->flag}}">
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
        <option value="{{ $category->category_id }}" {{ $category->category_id ==$truck->category ? 'selected' : '' }}>{{ $category->category_name }}</option>
    @endif 
@endforeach
</select>
</div>
<div>{{$errors->first('category')}}</div>

<p>Behorend tot:</p>
<div class="input-group">
<select name="region">
<optgroup label="regio">
@foreach($regions as $region) 
    @if($new_region ==$region->region_id)
        <option value="{{ $region->region_id }}" selected>{{ $region->region_name }}</option>
    @else
        <option value="{{ $region->region_id }}" {{ $archive->region_id ==$truck->region ? 'selected' : '' }}>{{ $region->region_name }}</option>
    @endif 
@endforeach
</select>
</div>
<div>{{$errors->first('region')}}</div>

<input type="submit" value="wijzig" class="btn btn-primary">
@csrf
</form>

@endsection