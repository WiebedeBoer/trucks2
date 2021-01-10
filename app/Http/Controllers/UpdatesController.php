<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Truck;

class UpdatesController extends Controller
{
	//index 
    public function index()
    {            	
        $updates = Truck::where('update',1)->paginate(50);  
        return view('updates.index', compact('updates'));     
    }
	  
}
