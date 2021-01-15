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
        $categories = RegionCategory::all(); 
        $hierarchy_count = Hierarchy::where('lower',$id)->count();
        if($hierarchy_count >=1){
            $truck_count =0;
            $hierarchies = Hierarchy::with('lowers')->where('lower',$id)->paginate(50);
            $trucks =[];
        }
        else {
            $truck_count = Truck::where('region',$id)->count();
            if($truck_count >=1){
                $trucks = Truck::with('categories','photos')->where('region',$id)->paginate(50);
            }
            else {
                $trucks =[];
            } 
            $hierarchies =[];
        }
        return view('regions.show', compact('region','categories','hierarchy_count','hierarchies','truck_count','trucks','hierarchy','upper_region','archive'));
    }

	//edit
    public function edit($id)
    {  
        $region = Region::with('categories')->where('region_id', $id)->firstOrFail(); 
        $categories = RegionCategory::all(); 
        $hierarchy_count = Hierarchy::where('lower',$id)->count();
        if($hierarchy_count >=1){
            $truck_count =0;
            $hierarchies = Hierarchy::with('lowers')->where('lower',$id)->paginate(50);
            $trucks =[];

            $hierarchy = Hierarchy::where('lower',$region->region_id)->first();
            $upper_region = Region::with('categories')->where('region_id', $hierarchy->upper)->first();
            $archive = Archive::where('archive_id',$upper_region->archive)->first();
        }
        else {
            $truck_count = Truck::where('region',$id)->count();
            if($truck_count >=1){
                $trucks = Truck::with('categories','photos')->where('region',$id)->paginate(50);
            }
            else {
                $trucks =[];
            } 
            $hierarchies =[];

            $hierarchy =NULL;
            $upper_region =NULL;
            $archive = Archive::where('archive_id',$region->archive)->first();
        }

        return view('regions.edit', compact('region','categories','hierarchy_count','hierarchies','truck_count','trucks','hierarchy','upper_region','archive'));
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
