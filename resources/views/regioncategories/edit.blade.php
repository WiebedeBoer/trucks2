@extends('layouts.archive')
@section('title')
Onserfgoed - Categorie
@endsection
@section('content')

<form method="POST" action="/regioncategories/{{ $region_category->category_id }}" class="pb-3">
@method('PATCH')

<p>Naam:</p>
<div class="input-group">
<input type="text" name="category_name" value="{{old('category_name') ?? $region_category->category_name}}">
</div>
<div>{{$errors->first('category_name')}}</div>

<p>Beschrijving:</p>
<div class="input-group">
<input type="text" name="description" value="{{old('description') ?? $region_category->description}}">
</div>
<div>{{$errors->first('description')}}</div>

<input type="submit" value="wijzig" class="btn btn-primary">
@csrf
</form>

@endsection