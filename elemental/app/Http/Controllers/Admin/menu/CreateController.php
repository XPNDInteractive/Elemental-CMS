<?php

namespace App\Http\Controllers\Admin\Menu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use Validator;
use App\Menu;
class CreateController extends Controller
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
    public function index()
    {
        

        return view('admin.menu.create',[
            'nav' => true,
            'sidebar' => true,
            'action' => Route('menu_save'),
            'title' => 'update',
        ]);
    }

    public function save(Request $request)
    {
        $this->middleware('auth');

        

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

            
            
            $menu = new Menu();
            $menu->name = $request->input("name");
            $menu->path =  $request->input("path");
            $menu->weight = $request->input("weight");
            $menu->active = $request->input("status") == "on" ? true:false;
            $menu->save();

           

            return redirect()->route('menu')->withMessage("succes", "your post was saved successfully");
        }
    }

    public function delete(Request $request, $id){
        
        Menu::where('id', $id)->delete();
        return redirect()->route("menu");
    }
}