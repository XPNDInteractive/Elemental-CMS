<?php

namespace App\Http\Controllers\Admin\Events;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;

class EventsController extends Controller
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
        $pages = Event::all();

        return view('admin.events.list',[
            'nav' => true,
            'sidebar' => true,
            'pages' => $pages
        ]);
    }
}