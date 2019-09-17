<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use App\Post;
use App\Event;
use App\Menu;
use App\Settings;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        ini_set('upload_max_filesize', '10M');
        ini_set('post_max_size', '10M');
        ini_set('max_input_time', 300);
        ini_set('max_execution_time', 300);
        //dd($request->path());

        if($request->path() == '/'){
            $page = Page::where("slug", $request->path())->first();
        }

        else{
          
            $page = Page::where("slug", rawurldecode($request->path()))->first();
        }

        if(is_null($page)){
            abort(404);
        }

       
        $posts = Post::where("active", true)->orderBy("created_at", 'acs')->paginate(5);
        $events = Event::where("active", true)->paginate(5);
        $post = Post::where("slug", 'blog/post/' . $request->segment(count($request->segments())))->first();
      
        $event = Event::where("slug", 'event/post/' . $request->segment(count($request->segments())))->first();
        $menu = Menu::where('active', true)->orderBy("weight", 'asc')->get();
        $fields = $page->fields()->get();
       

      

        return view('site.' . str_replace(".blade.php", "", $page->template),[
            'page' => $page,
            'posts' => $posts,
            'post' => $post,
            'events' => $events,
            'event' => $event,
            'menu' => $menu,
            'fields' => $fields,
            'siteTitle' => Settings::where('name', 'Site Title')->first()->value
        ]);


    }

   
}