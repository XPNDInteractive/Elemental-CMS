<?php

namespace App\Http\Controllers\Admin\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use Validator;
use App\Media;
use App\Field;

class UpdateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $id)
    {
       
       $page = Page::where('id', $id)->first();

        return view('admin.pages.create',[
            'nav' => true,
            'sidebar' => true,
            'page' => $page,
            'templates' => $this->getSiteTemplates(\resource_path() . '/views/site/')
            
        ]);
    }

    public function save(Request $request)
    {
        $this->middleware('auth');

        //dd($request->input());

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'slug' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        else{
            $page = Page::where('title', $request->input("title"))->first();

            
            if(is_null($page)){
                $page = new Page();
                $page->title = $request->input("title");
                $page->slug = $request->input("slug");
                $page->description = $request->input("description");
                $page->template = $request->input("template");
                $page->keywords = $request->input("keywords");
                $page->frontpage = $request->input("frontpage") == "on" ? true:false;
                $page->active = $request->input("status") == "on" ? true:false;
                $page->save();
            }
            
            else{
                $page->title = $request->input("title");
                $page->slug = $request->input("slug");
                $page->description = $request->input("description");
                $page->template = $request->input("template");
                $page->keywords = $request->input("keywords");
                $page->frontpage = $request->input("frontpage") == "on" ? true:false;
                $page->active = $request->input("status") == "on" ? true:false;
                $page->update();
            }

            $page = Page::where('title', $request->input("title"))->first();
            
            return redirect()->route('pages_content', ['id' => $page->id]);
        }
    }

    public function addBlock(Request $request){

        $this->middleware('auth');

        //dd($request->input());

        $validator = Validator::make($request->all(), [
            'field-name' => 'required|max:255',
            'field-content' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        else{
            
            $field = new Field();
            $field->page_id = $request->input('page-id');
            $field->type = $request->input('field-type');
            $field->name = $request->input('field-name');
            $field->value = $request->input('field-content');
            $field->save();

            return redirect()->route('pages_content', ['id' => $request->input('page-id')]);
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