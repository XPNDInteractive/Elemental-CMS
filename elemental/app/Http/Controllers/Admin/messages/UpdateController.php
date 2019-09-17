<?php

namespace App\Http\Controllers\Admin\Messages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use Validator;
use App\Media;
use App\Field;
use App\Event;
use App\Messages;

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

        $post = Messages::where('id', $id)->first();

        return view('admin.messages.create',[
            'nav' => true,
            'sidebar' => true,
            'page' => $post,
            'media' => Media::all(),
            'action' => Route('menu_save_update'),
            'title' => 'update'
            
        ]);
    }

}