<?php

namespace App\Http\Controllers\Admin\Events;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use Validator;
use App\Media;
use App\Field;
use App\Post;
use App\Event;

class CreateController extends Controller
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
    public function index()
    {
        $this->middleware('auth');

        $pages = Page::all();

        return view('admin.events.create',[
            'nav' => true,
            'sidebar' => true,
            'pages' => $pages,
            'page' => null,
            'media' => Media::all(),
            'templates' => $this->getSiteTemplates(\resource_path() . '/views/site/'),
            'action' => Route('events_save')
            
        ]);
    }

    public function save(Request $request)
    {
        $this->middleware('auth');

        

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:events',
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

            
            
            $post = new Event();
            $post->name = $request->input("name");
            $post->slug = 'event/post/'. str_replace(' ', '-', $request->input("name"));
            $post->description = $request->input("description");
            $post->address = $request->input("address");
            $post->phone =  $request->input("phone");
            $post->email = $request->input("email");
            $post->media_id = $request->input("image");
            $post->datetime = $request->input("datetime"); 
            $post->active = $request->input("status") == "on" ? true:false;
            $post->save();

            $page = new Page();
            $page->title = $request->input("name");
            $page->slug = 'event/post/'. str_replace(' ', '-', $request->input("name"));
            $page->description = $request->input('description');
            $page->keywords = $request->input('keywords');
            $page->template = "event";
            $page->active = true;
            $page->save();
            

            return redirect()->route('events')->withMessage("succes", "your post was saved successfully");
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


    public function delete(Request $request, $id){
        
        Event::where('id', $id)->delete();
        return redirect()->route("events");
    }
}