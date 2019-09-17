<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use Validator;
use App\User;
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
        $pages = Page::all();

        return view('admin.users.create',[
            'nav' => true,
            'sidebar' => true,
            'pages' => $pages,
            'action' => Route('users_save'),
            'title' => 'update',
        ]);
    }

    public function save(Request $request)
    {
        $this->middleware('auth');

        

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

            
            
            $post = new User();
            $post->name = $request->input("name");
            $post->email =  $request->input("email");
            $post->password = bcrypt($request->input("password"));
            $post->save();

           

            return redirect()->route('users')->withMessage("succes", "your post was saved successfully");
        }
    }

    public function delete(Request $request, $id){
        
        User::where('id', $id)->delete();
        return redirect()->route("users");
    }
}