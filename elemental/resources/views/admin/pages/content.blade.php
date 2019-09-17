
    
@extends('admin.base.base')

@section('content')
         <div class="w-100 p-5 row m-0 page-info text-white align-items-center">
            <a class="btn btn-primary mr-5" href="{{Route('pages_create')}}">Back</a>
            <p class="mr-3 mb-0 "><strong class="">Title:</strong> {{$page->title}}</p>
            <p class="mr-3 mb-0 "><strong class="">Slug:</strong> {{url('/') . $page->slug}}</p>
            <p class="mr-3 mb-0 "><strong class="">Template:</strong> {{ $page->template}}</p>
            <p class="mr-3 mb-0 "><strong class="">Status:</strong> {{ $page->active == true ? 'Active':'Inactive'}}</p>
            
        </div>
        <div class="row m-2 m-md-5">
           
            <div class="row m-0 w-100 align-items-start p-3">
                <button type="button" class="btn btn-primary mr-1" data-toggle="modal" data-target="#addMedia">
                    Add Media
                </button>
                <button type="button" class="btn btn-primary mr-1" data-toggle="modal" data-target="#addText">
                    Add Text
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addHTML">
                    Add HTML
                </button>
                <p class="col-12 p-0 mt-2">Content fields allow you to easily extend the content fields available for your page.  This is also a convient and easy way to manage all the content on your pages.</p>
            </div>
            <div class="fields row m-0 w-100">
                @foreach($page->fields()->get() as $field)
                    <div class="col-12 p-0 w-100 card mb-5">
                        <div class="card-header m-0 row w-100 align-items-center">
                            <p class="m-0"><strong>Field Name:</strong> {{$field->name}}</p>
                            <a href="{{Route('pages_delete_block', ['id' => $field->id])}}" class="btn btn-primary ml-auto">Delete</a>
                        </div>
                        <div class="card-body">
                            @if($field->type == "text")
                            <p>{!!$field->value!!}<p>
                            @endif
                            @if($field->type == "image")
                                <img class="w-25" src="{{$field->value}}"/>
                            @endif
                        </div>
                        
                        
                    </div> 
                @endforeach
            </div>
            <div class="row m-0 w-100">
                <a href="{{Route('pages')}}" class="btn btn-primary ml-auto">Finished</a>
            </div>
        </div>

<div  class="modal fade {{ old('addMedia') ? "input-errors":null}}" id="addMedia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
       <form  action="{{Route("pages_add_block")}}" method="post">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Add Media Field</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="content-field p-5 w-100">
                    @csrf
                    <label>Field Name</label>
                    <input class="form-control mb-2 {{ $errors->has('field-name') ? ' is-invalid' : '' }}" type="text" name="field-name" placeholder="field name" value="{{old('field-title')}}"/>    
                     @if ($errors->has('field-name'))
                        <span class="invalid-feedback d-block" role="alert">
                            <p class="text-danger">{{ $errors->first('field-name') }}</p>
                        </span>
                    @endif
                    <input type="hidden" name="addMedia" value="addText"/>
                    <input type="hidden" name="page-id" value="{{$page->id}}"/>
                    <input type="hidden" name="field-type" value="image"/>
                    <label>Field Media</label>
                   
                    <div class="media-editor row m-0 justify-content-center border p-3 p-md-5 align-items-start flex-column text-left bg-white">
                        <img class="img {{ $errors->has('field-content') ? ' border-danger' : '' }}" src="{{old('field-content')}}"/>
                        <input type="hidden" name="field-content" value=""/>
                         @if ($errors->has('field-content'))
                            <span class="invalid-feedback d-block" role="alert">
                                <p class="text-danger">{{ $errors->first('field-content') }}</p>
                            </span>
                        @endif
                        <button type="button" class="btn btn-primary select-media">
                            Select Media <i class="fas fa-plus"></i>
                        </button>
                        <p class="w-50 mt-2">You are able to add various media elements to your page by uploading or linking as needed.</p>
                        <div class="row m-0 border p-0 p-md-5 align-items-center page-gallery" style="height: 400px; overflow-y:auto;">
                            @foreach($media as $img)
                                <div class="col-12 col-md-6">
                                    <img data-item="{{$img->id}}" class="w-100 border p-2 bg-white gallery-item" src="{{$img->path}}"/>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                </div>
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div  class="modal fade {{old('addText') ? "input-errors":null}}" id="addText" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form  action="{{Route("pages_add_block")}}" method="post">
            @csrf
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Add Text Field</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="content-field p-5 w-100">
                    <input type="hidden" name="addText" value="addText"/>
                     <input type="hidden" name="field-type" value="text"/>
                    <label>Field Name</label>
                    <input class="form-control mb-2" type="text" name="field-name" placeholder="field name" value="{{old('field-title')}}"/>    
                     @if ($errors->has('field-name'))
                        <span class="invalid-feedback d-block" role="alert">
                            <p class="text-danger">{{ $errors->first('field-name') }}</p>
                        </span>
                    @endif
                    <label>Field Content</label>
                    <textarea name="field-content" class="content-editor">{{old('field-content')}}</textarea>
                     @if ($errors->has('field-content'))
                        <span class="invalid-feedback d-block" role="alert">
                            <p class="text-danger">{{ $errors->first('field-content') }}</p>
                        </span>
                    @endif
                    <input type="hidden" name="page-id" value="{{$page->id}}"/>
                        
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
  </div>
</div>

@endsection
