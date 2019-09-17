<?php

namespace App\Http\Controllers\Admin\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use Validator;
use App\Media;
use App\Field;

class ContentController extends Controller
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
    public function index(Request $request)
    {
        $page = Page::where("id", $request->input('id'))->first();

        if(is_null($page)){
            abort(500);
        }

        return view('admin.pages.content',[
            'nav' => true,
            'sidebar' => true,
            'page' => $page,
            'media' => Media::all(),
            
        ]);
    }


    public function addBlock(Request $request){

        $this->middleware('auth');

        //dd($request->input());

        $validator = Validator::make($request->all(), [
            'field-name' => 'required|max:255',
            'field-content' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        else{
            
            $field = new Field();
            $field->page_id = $request->input('page-id');
            $field->type = $request->input('field-type');
            $field->name = $request->input('field-name');
            $field->value = $request->input('field-content');
            $field->save();

            return redirect()->route('pages_content', ['id' => $request->input('page-id')]);
        }
    }

    public function deleteBlock(Request $request, $id){
        
        Field::where('id', $id)->delete();
        return redirect()->back();
    }
}