<!--archief-->
<a href="/archive">
Archief
</a>
<!--land-->
->
<a href="/archive/{{$archive->archive_id}}">
@if($archive->category !=NULL)
{{$archive->categories->category_name}}
@endif
{{$archive->archive_name}}
</a>
<!--bovenste region-->
@if($hierarchy !=NULL)
->
<a href="/regions/{{$upper_region->region_id}}">
@if($region->category !=NULL)
{{$region->categories->category_name}}
@endif
{{$region->region_name}}
</a>
@endif
<!--onderste regio-->
->
<a href="/regions/{{$region->region_id}}">
@if($region->category !=NULL)
{{$region->categories->category_name}}
@endif
{{$region->region_name}}
</a>
