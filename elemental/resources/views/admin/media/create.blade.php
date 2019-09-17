
    
@extends('admin.base.base')

@section('content')
    <div class="list">
         <div class="row m-0 tools mb-4 align-items-center">
            <div class="col col-md-12 mr-5">
                <h6>Welcome to the page creation wizard</h6>
                <p>This is where you will define your pages title, slug, and status.  You also get control your pages seo, design and content. I hope you enjoy the process in creating your website pages. Our goal was to make the process as easy and strait forward as possible.</p>
            </div>
        
        </div>
        
        <form class="row m-0 create-form" action="{{Route("pages_save")}}" method="post">
            @if (count($errors->all()) !== 0)
               <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
                <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
            @csrf
             <div class="col-sm-12 col-lg-12 form-group p-0">
                         <label>File Upload</label>
                        <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        @if ($errors->has('title'))
                            <span class="invalid-feedback d-block" role="alert">
                                <p class="text-danger">{{ $errors->first('title') }}</p>
                            </span>
                        @endif
                        <p>Please do not use any special characters in your title.  Please make your title clear and related to the intended content.</p>
                       
                    </div>
                    <hr class="w-100 my-5" />
                    <div class="col-sm-12 col-lg-12 form-group p-0">
                        <label>Media Path</label>
                       <input class="form-control" type="text" name="link" value="" placeholder="http://someurl.com/"/>
                        @if ($errors->has('title'))
                            <span class="invalid-feedback d-block" role="alert">
                                <p class="text-danger">{{ $errors->first('title') }}</p>
                            </span>
                        @endif
                        <p>Please do not use any special characters in your title.  Please make your title clear and related to the intended content.</p>
                        <div class="row m-0 w-100 mt-5">
                            <button type="submit" class="btn btn-primary ml-auto">Save</button>
                        </div>
                    </div>
            
            
            
        </form>
   </div>

@endsection
