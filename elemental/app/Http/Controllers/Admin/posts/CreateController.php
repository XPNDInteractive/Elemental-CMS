<?php

namespace App\Http\Controllers\Admin\Posts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use Validator;
use App\Media;
use App\Field;
use App\Post;

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

        return view('admin.posts.create',[
            'nav' => true,
            'sidebar' => true,
            'pages' => $pages,
            'page' => null,
            'media' => Media::all(),
            'templates' => $this->getSiteTemplates(\resource_path() . '/views/site/'),
            'action' => Route('posts_save')
            
        ]);
    }

    public function save(Request $request)
    {
        $this->middleware('auth');

        

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255|unique:posts',
            'content' => 'required',
            
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        else{

            
            
            $post = new Post();
            $post->title = $request->input("title");
            $post->slug = 'blog/post/'. $request->input("title");
            $post->media_id = $request->input("image");
            $post->user_id = $request->user()->id;
            $post->content = $request->input("content");
            $post->active = $request->input("status") == "on" ? true:false;
            $post->save();

            $page = new Page();
            $page->title = $request->input("title");
            $page->slug = 'blog/post/' . $request->input("title");
            $page->description = $request->input('description');
            $page->keywords = $request->input('keywords');
            $page->template = "post";
            $page->active = true;
            $page->save();
            

            return redirect()->route('posts')->withMessage("succes", "your post was saved successfully");
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
        
        Post::where('id', $id)->delete();
        return redirect()->route("posts");
    }

}