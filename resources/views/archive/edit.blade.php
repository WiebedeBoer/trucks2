@extends('layouts.archive')
@section('title')
Onserfgoed - Archief
@endsection
@section('content')

@include('archive.breadcrumb')

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

@if(region_count >=1)

{{ $regions->links() }}
<table id="myTable" class="tablesorter table table-striped">
    <thead>
        <tr>
          <th class="rug-text-nowrap sortable">Naam

          </th>
          <th class="rug-text-nowrap sortable">Categorie

          </th>
          <th class="rug-text-nowrap sortable">Vlag

          </th>
    </thead>
    <tbody>
    @foreach($regions as $region)
<tr class="clickable-row">   
        <td class="data-tabel"><a href="/regions/{{ $region->truck_id }}">{{ $region->region_name }}</a></td> 
        @if($truck->category !=NULL)
        <td class="data-tabel">{{ $region->categories->category_name }}</td>
        @else
        <td class="data-tabel">&nbsp;</td>
        @endif
        @if($region->flag !=NULL) 
        <td class="data-tabel">{{ $region->flag }}</td> 
        @else
        <td class="data-tabel">&nbsp;</td>
        @endif
        @endif
</tr>
@endforeach
</tbody>
</table>
{{ $regions->links() }}
@endif

@endsection