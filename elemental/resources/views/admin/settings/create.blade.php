
    
@extends('admin.base.base')

@section('content')
    <div class="row tools m-0 p-3 mb-4 align-items-center page-info">
        <div class="col col-md-5 mr-5 p-0">
            <h6 class=" m-0">Admin / Settings</h6>
            
        </div>
      
        
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

            @foreach($settings as $setting)
            <div class="col-sm-12 col-lg-12 row m-0 justify-content-start align-items-center">
                <label>{{$setting->name}}</label>
                <input class="form-control {{ $errors->has($setting->name) ? ' is-invalid' : '' }}" type="text" name="{{$setting->id}}" value="{{$setting->value}}"/>
                @if ($errors->has($setting->name))
                    <span class="invalid-feedback d-block" role="alert">
                        <p class="text-danger">{{ $errors->first($setting->name) }}</p>
                    </span>
                @endif
                <p class='w-100'>The name of the menu item that appears on your site.</p>
            </div>
            @endforeach
           
            <div class="row m-0 p-3 w-100">
                <button type="submit" class="btn btn-primary ml-auto">Save</button>
            </div>
        </div>
           
    </form>

@endsection
