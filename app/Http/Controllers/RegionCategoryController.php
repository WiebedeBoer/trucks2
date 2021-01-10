<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RegionCategory;

class RegionCategoryController extends Controller
{
	//index 
    public function index()
    {            	
        $categories = RegionCategory::paginate(50);  
        return view('regioncategories.index', compact('categories'));    
    }
	  
    //show
    public function show($id)
    { 
        $category = RegionCategory::where('category_id', $id)->firstOrFail(); 
        return view('regioncategories.show', compact('category'));
    }

	//edit
    public function edit($id)
    {  
        $category = RegionCategory::where('category_id', $id)->firstOrFail();  
        return view('regioncategories.edit', compact('category'));
    }

	//create
    public function create()
    {  
        $category = new RegionCategory();       
        return view('regioncategories.create', compact('category'));
    }

	//update function
    public function update(Request $request, $id)
    {  
        $data = request()->validate([
            'category_name' => 'required|min:2',
            'description' => 'nullable'
        ]);
        RegionCategory::where('category_id',$id)->update($data);
        return redirect('/regioncategories')->with('message', 'Succesvol gewijzigd');
    }

    //store function
    public function store()
    {
        $data = request()->validate([
            'category_name' => 'required|min:2',
            'description' => 'nullable'
        ]);
        $category = new RegionCategory();       
        $category->category_name = request('category_name');
        $category->description = request('description');
        $category->save(); 
        //return
        return redirect('/regioncategories')->with('message', 'Succesvol ingevoerd ');
    }

	//delete function
    public function destroy($id)
    {  
        //delete
        $category = RegionCategory::findOrFail($id);
        $category->delete();
        //return
        return redirect('/regioncategories')->with('message', 'Succesvol verwijderd');
    }
}
