@extends('layouts.archive')
@section('title')
Onserfgoed - Archief
@endsection
@section('content')

@include('archive.breadcrumb')

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