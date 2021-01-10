<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ArchiveCategory;

class ArchiveCategoryController extends Controller
{
	//index 
    public function index()
    {            	
        $categories = ArchiveCategory::paginate(50);  
        return view('archivecategories.index', compact('categories'));    
    }
	  
    //show
    public function show($id)
    { 
        $category = ArchiveCategory::where('category_id', $id)->firstOrFail(); 
        return view('archivecategories.show', compact('category'));
    }

	//edit
    public function edit($id)
    {  
        $category = ArchiveCategory::where('category_id', $id)->firstOrFail();  
        return view('archivecategories.edit', compact('category'));
    }

	//create
    public function create()
    {  
        $category = new ArchiveCategory();       
        return view('archivecategories.create', compact('category'));
    }

	//update function
    public function update(Request $request, $id)
    {  
        $data = request()->validate([
            'category_name' => 'required|min:2',
            'description' => 'nullable'
        ]);
        ArchiveCategory::where('category_id',$id)->update($data);
        return redirect('/archivecategories')->with('message', 'Succesvol gewijzigd');
    }

    //store function
    public function store()
    {
        $data = request()->validate([
            'category_name' => 'required|min:2',
            'description' => 'nullable'
        ]);
        $category = new ArchiveCategory();       
        $category->category_name = request('category_name');
        $category->description = request('description');
        $category->save(); 
        //return
        return redirect('/archivecategories')->with('message', 'Succesvol ingevoerd ');
    }

	//delete function
    public function destroy($id)
    {  
        //delete
        $category = ArchiveCategory::findOrFail($id);
        $category->delete();
        //return
        return redirect('/archivecategories')->with('message', 'Succesvol verwijderd');
    }
}
