<?php

namespace App\Http\Controllers\Admin\Media;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Media;
use Validator;
use Illuminate\Support\Facades\Storage;

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

    public function upload(Request $request)
    {

       

        $validator = Validator::make($request->all(), [
            'file' => 'required|image',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        else{
           
            //$path = $request->file('file')->storeAs('public/media', $request->file->getClientOriginalName());

            Storage::disk("uploads")->putFileAs('media', $request->file('file'), $request->file->getClientOriginalName());

            $page = new Media();
            $page->path = "/storage/media/" .$request->file->getClientOriginalName();
            $page->save();

            

            return redirect()->route('media')->withMessage("success", "you have successfully created your page");
        }
    }

    public function link(Request $request)
    {

        $this->middleware('auth');
       
        $validator = Validator::make($request->all(), [
            'media_url' => 'required|url',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        else{
            $page = new Media();
           
            if($request->input("video")){
                $page->type = "video";
            }

            if($request->input("youtube")){
                $page->type = "youtube";
            }

            $page->path = $request->input("media_url");

            $page->save();

            return redirect()->route('media')->withMessage("success", "you have successfully created your page");
        }
    }

    public function delete(Request $request, $id){
        
        Media::where('id', $id)->delete();
        return redirect()->route("media");
    }
}