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
