<?php

namespace App\Http\Controllers\Admin\Menu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;

class MenuController extends Controller
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
        $users = Menu::orderBy('weight', 'asc')->get();

        return view('admin.menu.list',[
            'nav' => true,
            'sidebar' => true,
            'pages' => $users
        ]);
    }
}