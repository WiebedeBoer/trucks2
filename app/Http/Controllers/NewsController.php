<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;

class NewsController extends Controller
{
	//index 
    public function index()
    {            	
        $news = News::paginate(50);  
        return view('news.index', compact('news'));    
    }
	  
    //show
    public function show($id)
    { 
        $news = News::with('categories')->where('news_id', $id)->firstOrFail(); 
        return view('news.show', compact('news'));
    }

	//edit
    public function edit($id)
    {  
        $news = News::with('categories')->where('news_id', $id)->firstOrFail(); 
        return view('news.edit', compact('news'));
    }

	//create
    public function create()
    {  
        $news = new News();        
        return view('news.create', compact('news'));
    }

	//update function
    public function update(Request $request, $id)
    {  
        $data = request()->validate([
            'news_name' => 'required|min:2',
            'news' => 'required'
        ]);
        News::where('news_id',$id)->update($data);
        return redirect('/news')->with('message', 'Succesvol gewijzigd');
    }

    //store function
    public function store()
    {
        $data = request()->validate([
            'news_name' => 'required|min:2',
            'news' => 'required'
        ]);
        $news = new News();       
        $news->news_name = request('news_name');
        $news->news = request('news');
        $news->save(); 
        //return
        return redirect('/news')->with('message', 'Succesvol ingevoerd ');
    }

	//delete function
    public function destroy($id)
    {  
        //delete
        $news = news::findOrFail($id);
        $news->delete();
        //return
        return redirect('/news')->with('message', 'Succesvol verwijderd');
    }
}
