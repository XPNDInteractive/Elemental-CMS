<?php

namespace App\Http\Controllers\Admin\Menu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use Validator;
use App\Media;
use App\Field;
use App\Event;
use App\Menu;

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

        $post = Menu::where('id', $id)->first();

        return view('admin.menu.create',[
            'nav' => true,
            'sidebar' => true,
            'page' => $post,
            'media' => Media::all(),
            'action' => Route('menu_save_update'),
            'title' => 'update'
            
        ]);
    }

    public function save(Request $request)
    {
        $this->middleware('auth');

        //dd($request->input());

       
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'path' => 'required',
            'weight' => 'required|numeric'
           
            
            
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        else{
            
            $post = Menu::where('id', $request->input("id"))->first();
            $post->name = $request->input("name");
            $post->path =  $request->input("path");
            $post->weight = $request->input("weight");
            $post->update();

            //$page = Page::where('slug', $request->input("slug"))->first();
            
            

           
            
            return redirect()->route('menu')->with("succes", "your post was saved successfully");
        }
    }


}