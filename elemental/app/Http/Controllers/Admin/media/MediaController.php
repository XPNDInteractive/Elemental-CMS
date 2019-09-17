<?php

namespace App\Http\Controllers\Admin\Media;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Media;

class MediaController extends Controller
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
        $media = Media::all();

        return view('admin.media.list',[
            'nav' => true,
            'sidebar' => true,
            'media' => $media
        ]);
    }
}