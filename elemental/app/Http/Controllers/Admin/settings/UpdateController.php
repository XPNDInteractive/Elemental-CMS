<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use Validator;
use App\Media;
use App\Field;
use App\Event;
use App\Settings;

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

       
        $settings = Settings::all();

        foreach($settings as $setting){
            
            if(!is_null($request->input($setting->id))){
                $update = Settings::where('id', $setting->id)->first();
                $update->value = $request->input($setting->id);
                $update->update();
            }
        }
            
        return redirect()->route('settings')->with("succes", "your post was saved successfully");
        
    }


}