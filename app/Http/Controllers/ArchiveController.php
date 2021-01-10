<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Archive;
use App\Models\ArchiveCategory;

class ArchiveController extends Controller
{
	//index 
    public function index()
    {            	
        $archives = Archive::paginate(50);  
        return view('archive.index', compact('archives'));    
    }
	  
    //show
    public function show($id)
    { 
        $archive = Archive::with('categories')->where('archive_id', $id)->firstOrFail(); 
        $region_count = Region::where('archive', $id)->count();
        if($region_count >=1){
            $regions = Region::with('categories','trucks')->where('archive', $id)->paginate(50);
        }
        else {
            $regions =[];
        }   
        return view('archive.show', compact('archive','region_count','regions'));
    }

	//edit
    public function edit($id)
    {  
        $archive = Archive::with('categories')->where('archive_id', $id)->firstOrFail(); 
        $region_count = Region::where('archive', $id)->count();
        if($region_count >=1){
            $regions = Region::with('categories','trucks')->where('archive', $id)->paginate(50);
        }
        else {
            $regions =[];
        }   
        return view('archive.edit', compact('archive','region_count','regions'));
    }

	//create
    public function create()
    {  
        $archive = new Archive();
        $categories = ArchiveCategory::all();         
        return view('archive.create', compact('archive','categories'));
    }

	//update function
    public function update(Request $request, $id)
    {  
        $data = request()->validate([
            'archive_name' => 'required|min:2',
            'flag' => 'nullable',
            'category' => 'nullable|integer'
        ]);
        Archive::where('archive_id',$id)->update($data);
        return redirect('/archive')->with('message', 'Succesvol gewijzigd');
    }

    //store function
    public function store()
    {
        $data = request()->validate([
            'archive_name' => 'required|min:2',
            'flag' => 'nullable',
            'category' => 'nullable|integer'
        ]);
        $archive = new Archive();       
        $archive->archive_name = request('archive_name');
        $archive->flag = request('flag');
        $archive->category = request('category');
        $archive->save(); 
        //return
        return redirect('/archive')->with('message', 'Succesvol ingevoerd ');
    }

	//delete function
    public function destroy($id)
    {  
        //delete
        $archive = Archive::findOrFail($id);
        $archive->delete();
        //return
        return redirect('/archive')->with('message', 'Succesvol verwijderd');
    }
}
