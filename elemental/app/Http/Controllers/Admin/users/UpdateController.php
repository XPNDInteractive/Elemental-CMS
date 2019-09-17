<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use Validator;
use App\Media;
use App\Field;
use App\Event;
use App\User;

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

        $post = User::where('id', $id)->first();

        return view('admin.users.create',[
            'nav' => true,
            'sidebar' => true,
            'page' => $post,
            'media' => Media::all(),
            'action' => Route('users_save_update'),
            'title' => 'update'
            
        ]);
    }

    public function save(Request $request)
    {
        $this->middleware('auth');

        //dd($request->input());

       
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required'
            
            
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        else{
            $post = User::where('id', $request->input("id"))->first();
            $post->name = $request->input("name");
            $post->email =  $request->input("email");
            $post->password = bcrypt($request->input("password"));
            $post->update();

            //$page = Page::where('slug', $request->input("slug"))->first();
            
            

           
            
            return redirect()->route('users')->with("succes", "your post was saved successfully");
        }
    }


}