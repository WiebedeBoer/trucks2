@extends('layouts.archive')
@section('title')
Onserfgoed
@endsection
@section('content')

@include('objecten.breadcrumb')

{{$truck->truck_name}}

{{$truck->description}}

{{$truck->categories->category_name}}

@if($truck->photos->count() >=1)
{{$truck->photos->category_name}}
@endif

@endsection