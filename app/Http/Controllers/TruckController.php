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
        $trucks = Truck::paginate(50);  
        return view('objecten.index', compact('trucks'));    
    }
	  
    //show
    public function show($id)
    { 
        $truck = Truck::with('categories')->where('truck_id', $id)->firstOrFail(); 
        return view('objecten.show', compact('truck'));
    }

	//edit
    public function edit($id)
    {  
        $truck = Truck::with('categories')->where('truck_id', $id)->firstOrFail(); 
        $categories = Category::all();  
        return view('objecten.edit', compact('truck','categories'));
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
