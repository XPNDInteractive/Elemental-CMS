
    
@extends('admin.base.base')

@section('content')
    <div class="row tools m-0 p-3 mb-4 align-items-center page-info">
        <div class="col col-md-5 mr-5 p-0">
            <h6 class=" m-0">Admin / Menu / Create Link</h6>
            
        </div>
        
        @if(isset($page->id))
         <a class="btn btn-primary ml-auto" href="{{Route('menu_delete', ['id' => $page->id])}}">
            <i class="fas fa-trash"></i>
            Delete
        </a>
        @endif
        
    </div>
    <form action="{{$action}}" method="post">
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
            <input type = "hidden" name="id" value="{{isset($page->id) && $page->id !== null ? $page->id: old('id') }}"/>
            <div class="col-sm-12 col-lg-6 form-group">
                <label>Name</label>
                <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" value="{{isset($page->name) && $page->name !== null ? $page->name: old('name') }}"/>
                @if ($errors->has('name'))
                    <span class="invalid-feedback d-block" role="alert">
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                    </span>
                @endif
                <p class='w-100'>The name of the menu item that appears on your site.</p>
            </div>
            <div class="col-sm-12 col-lg-6 form-group">
                <label>Path</label>
                <input class="form-control {{ $errors->has('path') ? ' is-invalid' : '' }}" type="text" name="path" value="{{isset($page->path) && $page->path !== null ? $page->path: old('path') }}"/>
                @if ($errors->has('path'))
                    <span class="invalid-feedback d-block" role="alert">
                        <p class="text-danger">{{ $errors->first('path') }}</p>
                    </span>
                @endif
                <p class='w-100'>The url the link goes to such as (" http://google.com ")</p>
            </div>

              <div class="col-sm-12 col-lg-6 form-group">
                <label>Weight</label>
                <input class="form-control {{ $errors->has('weight') ? ' is-invalid' : '' }}" type="text" name="weight" value="{{isset($page->weight) && $page->weight !== null ? $page->weight: old('weight') }}"/>
                @if ($errors->has('weight'))
                    <span class="invalid-feedback d-block" role="alert">
                        <p class="text-danger">{{ $errors->first('weight') }}</p>
                    </span>
                @endif
                <p class='w-100'>The weight is to determine what order the menu items appear on the page.  Smallest appears first asscending to the largest.</p>
            </div>

             <div class="row m-0 w-100 p-3">
                <div class="custom-control custom-switch">
                    @if(isset($page->active) && $page->active == true || old('status') == true)
                    <input name="status" type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                    @else
                    <input name="status" type="checkbox" class="custom-control-input" id="customSwitch1">
                    @endif
                    <label class="custom-control-label" for="customSwitch1">Menu Active?</label>
                </div>
                
            </div>
            <div class="row m-0 p-3 w-100">
                <button type="submit" class="btn btn-primary ml-auto">Next</button>
            </div>
        </div>
           
    </form>

@endsection
