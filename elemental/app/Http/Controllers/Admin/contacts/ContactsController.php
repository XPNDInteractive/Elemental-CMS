<?php

namespace App\Http\Controllers\Admin\Contacts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;

class ContactsController extends Controller
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
        $pages = Contact::all();

        return view('admin.contacts.list',[
            'nav' => true,
            'sidebar' => true,
            'pages' => $pages
        ]);
    }
}