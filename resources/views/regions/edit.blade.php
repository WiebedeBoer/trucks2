@extends('layouts.archive')
@section('title')
Onserfgoed
@endsection
@section('content')

<form method="POST" action="/region/{{ $region->region_id }}" class="pb-3">
@method('PATCH')

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

<input type="submit" value="wijzig" class="btn btn-primary">
@csrf
</form>


@if($hierarchy_count >=1)
{{ $hierarchies->links() }}
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
@foreach($hierarchies as $hierarchy)
<tr class="clickable-row">   
        <td class="data-tabel"><a href="/region/{{ $hierarchy->lower }}">{{ $hierarchy->lowers->region_name }}</a></td> 
        <td class="data-tabel">{{ $hierarchy->lowers->flag }}</td> 
</tr>
@endforeach
</tbody>
</table>
{{ $hierarchies->links() }}
@else

@if(truck_count >=1)
{{ $trucks->links() }}
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
    @foreach($trucks as $truck)
<tr class="clickable-row">   
        <td class="data-tabel"><a href="/objecten/{{ $truck->truck_id }}">{{ $truck->truck_name }}</a></td> 
        @if($truck->category !=NULL)
        <td class="data-tabel">{{ $truck->categories->category_name }}</td>
        @else
        <td class="data-tabel">&nbsp;</td>
        @endif
        @if($truck->photos->count() >=1) 
        <td class="data-tabel">{{ $truck->photos->photo_name }}</td> 
        @else
        <td class="data-tabel">&nbsp;</td>
        @endif
        @endif
</tr>
@endforeach
</tbody>
</table>
{{ $trucks->links() }}
@endif

@endif

@endsection