<?php

namespace App\Http\Controllers\Admin\Events;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use Validator;
use App\Media;
use App\Field;
use App\Event;

class UpdateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $id)
    {
        $this->middleware('auth');

        $post = Event::where('id', $id)->first();

        return view('admin.events.create',[
            'nav' => true,
            'sidebar' => true,
            'post' => $post,
            'media' => Media::all(),
            'action' => Route('events_save_update')
            
        ]);
    }

    public function save(Request $request)
    {
        $this->middleware('auth');

        //dd($request->input());

       
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required',
            'datetime' => 'required'
            
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        else{
            $post = Event::where('id', $request->input("id"))->first();
            $post->name = $request->input("name");
            $post->slug = 'event/post/'. str_replace(' ', '-', $request->input("name"));
            $post->description = $request->input("description");
            $post->address = $request->input("address");
            $post->phone =  $request->input("phone");
            $post->email = $request->input("email");
            $post->media_id = $request->input("image");
            $post->datetime = $request->input("datetime"); 
            $post->active = $request->input("status") == "on" ? true:false;
            
            $post->update();

            $page = Page::where('slug', $request->input("slug"))->first();
            
            

           
            
            return redirect()->route('events')->with("succes", "your post was saved successfully");
        }
    }

   
    private function getSiteTemplates($dir, $results = array()){
        $files = scandir($dir);
    
        foreach($files as $key => $value){
            $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
            if(!is_dir($path)) {
                $results[] = $path;
            } else if($value != "." && $value != "..") {
                $results = $this->getSiteTemplates($path);
            }
        }
    
        return $results;
    }

}