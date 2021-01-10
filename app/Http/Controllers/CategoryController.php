<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
	//index 
    public function index()
    {            	
        $categories = Category::paginate(50);  
        return view('categories.index', compact('categories'));    
    }
	  
    //show
    public function show($id)
    { 
        $category = Category::where('category_id', $id)->firstOrFail(); 
        return view('categories.show', compact('category'));
    }

	//edit
    public function edit($id)
    {  
        $category = Category::where('category_id', $id)->firstOrFail();  
        return view('categories.edit', compact('category'));
    }

	//create
    public function create()
    {  
        $category = new Category();       
        return view('categories.create', compact('category'));
    }

	//update function
    public function update(Request $request, $id)
    {  
        $data = request()->validate([
            'category_name' => 'required|min:2',
            'description' => 'nullable'
        ]);
        Category::where('category_id',$id)->update($data);
        return redirect('/categories')->with('message', 'Succesvol gewijzigd');
    }

    //store function
    public function store()
    {
        $data = request()->validate([
            'category_name' => 'required|min:2',
            'description' => 'nullable'
        ]);
        $category = new Category();       
        $category->category_name = request('category_name');
        $category->description = request('description');
        $category->save(); 
        //return
        return redirect('/categories')->with('message', 'Succesvol ingevoerd ');
    }

	//delete function
    public function destroy($id)
    {  
        //delete
        $category = Category::findOrFail($id);
        $category->delete();
        //return
        return redirect('/categories')->with('message', 'Succesvol verwijderd');
    }
}
