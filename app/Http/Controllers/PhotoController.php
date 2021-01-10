<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Photo;

class PhotoController extends Controller
{
	//index 
    public function index()
    {            	
        $photos = Photo::paginate(50);  
        return view('photo.index', compact('photos'));    
    }
	  
    //show
    public function show($id)
    { 
        $photo = Photo::with('trucks')->where('photo_id', $id)->firstOrFail(); 
        return view('photo.show', compact('photo'));
    }

	//edit
    public function edit($id)
    {  
        $photo = Photo::with('trucks')->where('photo_id', $id)->firstOrFail();  
        return view('photo.edit', compact('photo','categories'));
    }

	//create
    public function create($id)
    {  
        $photo = new Photo();  
        
        return view('photo.create', compact('photo','categories'));
    }

	//update function
    public function update(Request $request, $id)
    {  
        
        $data = request()->validate([
            'photo_name' => 'required|min:2',
            'photo_url' => 'nullable|url',
            'description' => 'nullable'
        ]);
        Photo::where('photo_id',$id)->update($data);
        
        return redirect('/photo')->with('message', 'Succesvol gewijzigd');
    }

    //store function
    public function store(Request $request, $id)
    {
        /*
        $data = request()->validate([
            'photo_name' => 'required|min:2',
            'photo_url' => 'nullable|url',
            'description' => 'nullable'
        ]);
        $photo = new Photo();       
        $photo->photo_name = request('photo_name');
        $photo->photo_url = request('photo_url');
        $photo->description = request('description');
        $photo->save(); 
        */

        //allowed file types
        if ($request->hasFile('image')) {
            //  Let's do everything here
            if ($request->file('image')->isValid()) {
                $validated = $request->validate([
                    'name' => 'string|max:40',
                    'image' => 'mimes:jpeg,png|max:1014',
                ]);
                $extension = $request->image->extension();
                $request->image->storeAs('/public/'.$id.'/', $validated['name'].".".$extension);
                $url = Storage::url($validated['name'].".".$extension);
                $file = File::create([
                   'name' => $validated['name'],
                    'url' => $url,
                ]);
                Session::flash('success', "Succes.");
                $photo = new Photo();       
                $photo->photo_name = $validated['name'];
                //$photo->photo_url = request('photo_url');
                //$photo->description = request('description');
                $photo->truck = $id;
                $photo->save(); 
                //return
                return redirect('/objecten/'.$id)->with('message', 'Succesvol upgeload ');
            }
        }
        else {
            abort(500, 'Foto kon niet geladen worden');
        }
        


        
        
    }

	//delete function
    public function destroy($id)
    {  
        //delete
        $photo = Photo::findOrFail($id);
        $photo->delete();
        //return
        return redirect('/photo')->with('message', 'Succesvol verwijderd');
    }
}
