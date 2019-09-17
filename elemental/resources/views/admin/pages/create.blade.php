
    
@extends('admin.base.base')

@section('content')
    <div class="row tools m-0 p-3 mb-4 align-items-center page-info">
        <div class="col col-md-5 mr-5 p-0">
            <h6 class=" m-0">Admin / Pages / Create</h6>
           
        </div>
        @if(isset($page->id))
         <a class="btn btn-primary ml-auto" href="{{Route('pages_delete', ['id' => $page->id])}}">
            <i class="fas fa-trash"></i>
            Delete
        </a>
        @endif
    </div>
    <form action="{{Route('pages_save')}}" method="post">
        <div class="row m-2 m-md-5 p-5 border bg-white">
            @if (count($errors->all()) !== 0)
               <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
                <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
            @csrf
            <div class="col-sm-12 col-lg-6 form-group">
                <label>Page Title</label>
                <input class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" type="text" name="title" value="{{isset($page->title) && $page->title !== null ? $page->title: old('title') }}"/>
                @if ($errors->has('title'))
                    <span class="invalid-feedback d-block" role="alert">
                        <p class="text-danger">{{ $errors->first('title') }}</p>
                    </span>
                @endif
                <p class='w-100'>Please do not use any special characters in your title.  Please make your title clear and related to the intended content.</p>
            </div>
            <div class="col-sm-12 col-lg-6 form-group">
                <label>Page Slug</label>
                <div class="input-group w-100">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">{{url('/')}}</span>
                    </div>
                    <input name="slug" type="text" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" id="basic-url" aria-describedby="basic-addon3" value="{{isset($page->slug) && $page->slug !== null ? $page->slug:old('slug')}}">
                    
                </div>
                 @if ($errors->has('slug'))
                        <span class="invalid-feedback d-block" role="alert">
                            <p class="text-danger">{{ $errors->first('slug') }}</p>
                        </span>
                    @endif
                    <p>Please do not use any special characters in your title.  Please make your title clear and related to the intended content.</p>
            </div>
            <div class="col-sm-12 col-lg-6 form-group">
                <label>Page Meta Description</label>
                <textarea class="form-control" name="description">{{isset($page->description) && $page->description !== null ? $page->description:old('description')}}</textarea>
                <p>Please do not use any special characters in your title.  Please make your title clear and related to the intended content.</p>
            </div>
             <div class="col-sm-12 col-lg-6 form-group">
                <label>Page Meta Keywords</label>
                <textarea class="form-control" name="keywords">{{isset($page->keywords) && $page->keywords !== null ? $page->keywords:old('keywords')}}</textarea>
                <p>Please do not use any special characters in your title.  Please make your title clear and related to the intended content.</p>
            </div>
            <div class="col-sm-12 col-lg-12 form-group">
                <label>Page Template</label>
               <select name="template" class="custom-select">
                   @foreach($templates as $template)
                        @if(isset($page->template) && basename($template) == $page->template || basename($template) == old('template'))
                        <option value="{{basename($template)}}" selected>{{basename($template)}}</option>
                        @else
                         <option value="{{basename($template)}}">{{basename($template)}}</option>
                        @endif
                   @endforeach
                </select>
            </div>
            <div class="row m-0 w-100 p-3">
                <div class="custom-control custom-switch">
                    @if(isset($page->template) && $page->active == true || old('status') == true)
                    <input name="status" type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                    @else
                    <input name="status" type="checkbox" class="custom-control-input" id="customSwitch1">
                    @endif
                    <label class="custom-control-label" for="customSwitch1">Page Active?</label>
                </div>
                 <div class="custom-control custom-switch ml-5">
                        @if(isset($page->template) && $page->frontpage == true || old('frontpage') == true)
                            <input name="frontpage" type="checkbox" class="custom-control-input" id="customSwitch2" checked>
                        @else
                             <input name="frontpage" type="checkbox" class="custom-control-input" id="customSwitch2">
                        @endif
                    <label class="custom-control-label" for="customSwitch2">Page is front page?</label>
                </div>
                 
            </div>
            <div class="row m-0 p-3 w-100">
                <button type="submit" class="btn btn-primary ml-auto">Next</button>
            </div>
        </div>
           
    </form>

@endsection
