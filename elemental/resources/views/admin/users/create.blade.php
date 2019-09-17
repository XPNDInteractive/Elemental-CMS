
    
@extends('admin.base.base')

@section('content')
    <div class="row tools m-0 p-3 mb-4 align-items-center page-info">
        <div class="col col-md-5 mr-5 p-0">
            <h6 class=" m-0">Admin / Users / Create</h6>
            
        </div>
        
        @if(isset($page->id))
         <a class="btn btn-primary ml-auto" href="{{Route('pages_delete', ['id' => $page->id])}}">
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
            <div class="col-sm-12 col-lg-6 form-group">
                <label>Name</label>
                <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" value="{{isset($page->name) && $page->name !== null ? $page->name: old('name') }}"/>
                @if ($errors->has('name'))
                    <span class="invalid-feedback d-block" role="alert">
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                    </span>
                @endif
                <p class='w-100'>Please do not use any special characters in your title.  Please make your title clear and related to the intended content.</p>
            </div>
            <div class="col-sm-12 col-lg-6 form-group">
                <label>Email</label>
                <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" name="email" value="{{isset($page->email) && $page->email !== null ? $page->email: old('email') }}"/>
                @if ($errors->has('email'))
                    <span class="invalid-feedback d-block" role="alert">
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    </span>
                @endif
                <p class='w-100'>Please do not use any special characters in your title.  Please make your title clear and related to the intended content.</p>
            </div>

              <div class="col-sm-12 col-lg-6 form-group">
                <label>Password</label>
                <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" value="{{isset($page->password) && $page->password !== null ? $page->password: old('password') }}"/>
                @if ($errors->has('password'))
                    <span class="invalid-feedback d-block" role="alert">
                        <p class="text-danger">{{ $errors->first('password') }}</p>
                    </span>
                @endif
                <p class='w-100'>Please do not use any special characters in your title.  Please make your title clear and related to the intended content.</p>
            </div>

              <div class="col-sm-12 col-lg-6 form-group">
                <label>Confirm Password</label>
                <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password_confirmation" value=""/>
              
                <p class='w-100'>Please do not use any special characters in your title.  Please make your title clear and related to the intended content.</p>
            </div>
            
          
            <div class="row m-0 p-3 w-100">
                <button type="submit" class="btn btn-primary ml-auto">Next</button>
            </div>
        </div>
           
    </form>

@endsection
