<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Region;
use App\Models\RegionCategory;

class RegionController extends Controller
{
	//index 
    public function index()
    {            	
        $regions = Region::paginate(50);  
        return view('regions.index', compact('regions'));    
    }
	  
    //show
    public function show($id)
    { 
        $region = Region::with('categories')->where('region_id', $id)->firstOrFail(); 
        return view('regions.show', compact('region'));
    }

	//edit
    public function edit($id)
    {  
        $region = Region::with('categories')->where('region_id', $id)->firstOrFail(); 
        $categories = RegionCategory::all(); 
        return view('regions.edit', compact('region','categories'));
    }

	//create
    public function create()
    {  
        $region = new Region();
        $categories = RegionCategory::all();         
        return view('regions.create', compact('region','categories'));
    }

	//update function
    public function update(Request $request, $id)
    {  
        $data = request()->validate([
            'region_name' => 'required|min:2',
            'flag' => 'nullable',
            'category' => 'nullable|integer',
            'archive' => 'nullable|integer'
        ]);
        Region::where('region_id',$id)->update($data);
        return redirect('/regions')->with('message', 'Succesvol gewijzigd');
    }

    //store function
    public function store()
    {
        $data = request()->validate([
            'region_name' => 'required|min:2',
            'flag' => 'nullable',
            'category' => 'nullable|integer',
            'category' => 'nullable|integer'
        ]);
        $region = new Region();       
        $region->region_name = request('region_name');
        $region->flag = request('flag');
        $region->category = request('category');
        $region->save(); 
        //return
        return redirect('/regions')->with('message', 'Succesvol ingevoerd ');
    }

	//delete function
    public function destroy($id)
    {  
        //delete
        $region = Region::findOrFail($id);
        $region->delete();
        //return
        return redirect('/regions')->with('message', 'Succesvol verwijderd');
    }
}
