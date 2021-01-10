@extends('layouts.archive')
@section('title')
Onserfgoed
@endsection
@section('content')

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