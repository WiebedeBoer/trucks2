<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Archive;
use App\Models\Region;
use App\Models\Truck;

class SearchController extends Controller
{
	//index 
    public function index()
    {            	
        return view('search.index');  
    }
	  
    //show
    public function show(Request $request)
    { 
        $term = request('term');
        $type = request('type');
        //term
        //check existence
        $term_check = $this->termcheck($type,$term);
        if ($term_check >=1)
        {
            $type_num = $this->typename($type,$term);
            $resultcount = $this->resultscount($type_num,$type);
            //results
            if ($resultcount >=1){
                $results = $this->results($type_num,$type);
            }
            //no results
            else {
                $results =[];
            }

        }
        //nothing found
        else {
            $resultcount =0;
            $type_num =0;
            $results =[];
        }              
        return view('search.show', compact('type','term','type_num','results','resultcount','term_check')); 
    }

    //term check
    private function termcheck($type,$term)
    {
        //archive
        if ($type ==1){       
            $term_check = Archive::where('archive_name','like',$term)->orWhere('server_os_name',$term)->count();
        }
        //region
        elseif ($type ==2){       
            $term_check = Region::where('region_name','like',$term)->orWhere('language_name',$term)->count();
        }
        //truck
        elseif ($type ==3){       
            $term_check = Truck::where('truck_name','like',$term)->orWhere('framework_name',$term)->count();
        }
        //default
        else {       
            $term_check = Truck::where('truck_name','like',$term)->orWhere('dependency_name',$term)->count();
        }        
        return $term_check;

    }

    //type name
    private function typename($type,$term)
    {
        //archive
        if ($type ==1){       
            $type_name = Archive::where('archive_name','like',$term)->first(); 
            $type_num = $type_name->server_os_id;
        }
        //region
        elseif ($type ==2){       
            $type_name = Region::where('region_name','like',$term)->first(); 
            $type_num = $type_name->server_os_id;
        }
        //truck
        elseif ($type ==3){       
            $type_name = Truck::where('truck_name','like',$term)->first(); 
            $type_num = $type_name->server_os_id;
        }
        //default
        else {       
            $type_name = Truck::where('truck_name','like',$term)->first(); 
            $type_num = $type_name->server_os_id;
        } 
        return $type_num;
    }

    //results count
    private function resultscount($type_num,$type)
    {
        //archive
        if ($type ==1){       
            $resultcount = Archive::where('archive_name', $type_num)->count();
        }
        //region
        elseif ($type ==2){       
            $resultcount = Region::where('region_name', $type_num)->count();
        }
        //truck
        elseif ($type ==3){       
            $resultcount = Truck::where('truck_name', $type_num)->count();
        }
        //default
        else {       
            $resultcount = Truck::where('truck_name', $type_num)->count();
        }        
        return $resultcount;

    }

    //get results
    private function results($type_num,$type)
    {
        //archive
        if ($type ==1){      
            $results = Archive::where('archive_name', $type_num)->get();
        }
        //region
        elseif ($type ==2){       
            $results = Region::where('region_name', $type_num)->orderBy('language_version','DESC')->get();
        }
        //truck
        elseif ($type ==3){       
            $results = Truck::where('truck_name', $type_num)->orderBy('framework_version','DESC')->get();
        }
        //default
        else {       
            $results = Truck::where('truck_name', $type_num)->get();
        }        
        return $results;

    }

}
