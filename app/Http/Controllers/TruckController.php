<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Truck;
use App\Models\Category;

class truckController extends Controller
{
	//index 
    public function index()
    {            	
        $trucks = Truck::with('categories')->paginate(50);  
        return view('objecten.index', compact('trucks'));    
    }
	  
    //show
    public function show($id)
    { 
        $truck = Truck::with('categories')->where('truck_id', $id)->firstOrFail(); 
        $categories = Category::all(); 
        $photo_count = Photo::where('truck', $id)->count(); 
        if($photo_count >=1){
            $photos = Photo::with('trucks')->where('truck', $id)->get(); 
        }
        else{
            $photos =[];
        }
        $region = Region::with('categories')->where('region_id', $truck->region)->firstOrFail();
        $hierarchy_count = Hierarchy::where('lower',$region->region_id)->count();
        if($hierarchy_count >=1){
            $hierarchy = Hierarchy::where('lower',$region->region_id)->first();
            $upper_region = Region::with('categories')->where('region_id', $hierarchy->upper)->first();
            $archive = Archive::where('archive_id',$upper_region->archive)->first();
        }
        else {
            $hierarchy =[];
            $upper_region = [];
            $archive = Archive::where('archive_id',$region->archive)->first();
        }
        //return
        return view('objecten.show', compact('truck','categories','photo_count','photos','region','hierarchy_count','hierarchy','upper_region','archive'));
    }

	//edit
    public function edit($id)
    {  
        $truck = Truck::with('categories')->where('truck_id', $id)->firstOrFail(); 
        $categories = Category::all(); 
        $photo_count = Photo::where('truck', $id)->count(); 
        if($photo_count >=1){
            $photos = Photo::with('trucks')->where('truck', $id)->get(); 
        }
        else{
            $photos =[];
        } 
        $region = Region::with('categories')->where('region_id', $truck->region)->firstOrFail();
        $hierarchy_count = Hierarchy::where('lower',$region->region_id)->count();
        if($hierarchy_count >=1){
            $hierarchy = Hierarchy::where('lower',$region->region_id)->first();
            $upper_region = Region::with('categories')->where('region_id', $hierarchy->upper)->first();
            $archive = Archive::where('archive_id',$upper_region->archive)->first();
        }
        else {
            $hierarchy =NULL;
            $upper_region =NULL;
            $archive = Archive::where('archive_id',$region->archive)->first();
        }
        //return
        return view('objecten.edit', compact('truck','categories','photo_count','photos','region','hierarchy_count','hierarchy','upper_region','archive'));
    }

	//create
    public function create()
    {  
        $truck = new Truck();
        $categories = Category::all();         
        return view('objecten.create', compact('truck','categories'));
    }

	//update function
    public function update(Request $request, $id)
    {  
        $data = request()->validate([
            'truck_name' => 'required|min:2',
            'description' => 'nullable',
            'category' => 'nullable|integer',
            'region' => 'nullable|integer'
        ]);
        Truck::where('truck_id',$id)->update($data);
        return redirect('/objecten')->with('message', 'Succesvol gewijzigd');
    }

    //store function
    public function store()
    {
        $data = request()->validate([
            'truck_name' => 'required|min:2',
            'description' => 'nullable',
            'category' => 'nullable|integer',
            'region' => 'nullable|integer'
        ]);
        $truck = new Truck();       
        $truck->truck_name = request('truck_name');
        $truck->description = request('description');
        $truck->category = request('category');
        $truck->region = request('region');
        $truck->save(); 
        //return
        return redirect('/objecten')->with('message', 'Succesvol ingevoerd ');
    }

	//delete function
    public function destroy($id)
    {  
        //delete
        $truck = Truck::findOrFail($id);
        $truck->delete();
        //return
        return redirect('/objecten')->with('message', 'Succesvol verwijderd');
    }
}
