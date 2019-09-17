<?php

namespace App\Http\Controllers\Admin\Messages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Messages;

class MessagesController extends Controller
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
        $users = Messages::all();

        return view('admin.messages.list',[
            'nav' => true,
            'sidebar' => true,
            'pages' => $users
        ]);
    }
}