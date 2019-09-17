
    
@extends('admin.base.base')

@section('content')
    <div class="row tools m-0 p-3 mb-4 align-items-center page-info">
        <div class="col col-md-5 mr-5 p-0">
            <h6 class=" m-0">Admin / Events / Create</h6>
            
        </div>
        
        @if(isset($post->id))
         <a class="btn btn-primary ml-auto" href="{{Route('events_delete', ['id' => $post->id])}}">
            <i class="fas fa-trash"></i>
            Delete
        </a>
        @endif
    </div>
    <form  action="{{$action}}" method="post">
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
            <div class="row m-0 justify-content-center align-items-center">
                <div class="col-sm-12 col-md-6">
                    <div class="col-sm-12 p-0 form-group">
                        <label>Name:</label>
                        <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" value="{{isset($post->name) && $post->name !== null ? $post->name: old('name') }}"/>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback d-block" role="alert">
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            </span>
                        @endif
                        <p class='w-100'>Please do not use any special characters in your name.  Please make your name clear and related to the intended content.</p>
                    </div>
                    @if(isset($post->id))
                    <input name="id" type="hidden" value={{$post->id}}/>
                    @endif
                    <input name="slug" type="hidden" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" id="basic-url" aria-describedby="basic-addon3" value="{{isset($post->slug) && $post->slug !== null ? str_replace('/blog/post/', '', $post->slug):old('slug')}}">
                    
                    <div class="col-sm-12 p-0 form-group">
                        <label>Description:</label>
                        <textarea class="form-control" name="description">{{isset($post->description) && $post->description !== null ? $post->description:old('description')}}</textarea>
                        <p>Please do not use any special characters in your title.  Please make your title clear and related to the intended content.</p>
                    </div>


                    
                    <div class="col-sm-12 col-lg-12 p-0 form-group">
                        <label>Location:</label>
                        <textarea class="form-control" name="address">{{isset($post->address) && $post->address !== null ? $post->address:old('address')}}</textarea>
                        <p>Please do not use any special characters in your title.  Please make your title clear and related to the intended content.</p>
                    </div>

                    <div class="col-sm-12 p-0 form-group">
                        <label>Phone:</label>
                        <input class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" type="text" name="phone" value="{{isset($post->phone) && $post->phone !== null ? $post->phone: old('phone') }}"/>
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback d-block" role="alert">
                                <p class="text-danger">{{ $errors->first('phone') }}</p>
                            </span>
                        @endif
                        <p class='w-100'>Please do not use any special characters in your name.  Please make your name clear and related to the intended content.</p>
                    </div>

                    <div class="col-sm-12 p-0 form-group">
                        <label>Email:</label>
                        <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" name="email" value="{{isset($post->email) && $post->email !== null ? $post->name: old('email') }}"/>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback d-block" role="alert">
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            </span>
                        @endif
                        <p class='w-100'>Please do not use any special characters in your name.  Please make your name clear and related to the intended content.</p>
                    </div>


                     <div class="col-sm-12 p-0 form-group">
                        <label>Date/Time:</label>
                        <input class="form-control {{ $errors->has('datetime') ? ' is-invalid' : '' }}" type="text" name="datetime" value="{{isset($post->datetime) && $post->datetime !== null ? $post->datetime: old('datetime') }}"/>
                        @if ($errors->has('datetime'))
                            <span class="invalid-feedback d-block" role="alert">
                                <p class="text-danger">{{ $errors->first('datetime') }}</p>
                            </span>
                        @endif
                        <p class='w-100'>Please do not use any special characters in your name.  Please make your name clear and related to the intended content.</p>
                    </div>

                </div>
                <div class="col-6 row m-0 justify-content-center align-items-center flex-column p-5">
                    @if(old('image') == null && isset($post->media_id) && $post->media_id !== null)
                         <img class="w-100 post-featured-image mb-5" src="{{App\Media::where('id', $post->media_id)->first()->path}}"/>
                         <input class="post-image" type="hidden" name="image" value="{{$post->media_id}}"/>
                    @else  
                        <img class="w-100 post-featured-image mb-5" src="{{old('image') !== null ? App\Media::where('id', old('image'))->first()->path:''}}"/>
                         <input class="post-image" type="hidden" name="image" value="{{old('image')}}"/>
                    @endif
                   
                    
                    
                    <div class="post-image-placeholder w-100 row m-0 justify-content-center">
                        @if(old('image') == null && !isset($post->media_id))
                        <i style="font-size: 15rem;color: #f1f1f1;" class="fas fa-image"></i>
                        @endif
                        <div class="w-100 row m-0 justify-content-center">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                                Featured Media
                            </button>
                        </div>
                    </div>
                   
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Post Image</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row m-0 post-images">
                                        @foreach($media as $img)
                                            <div class="col-4 post-image">
                                                <img data-id="{{$img->id}}" src="{{$img->path}}" class="img-thumbnail"/>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Finished</button>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
           

            <div class="row m-0 w-100 p-3">
                <div class="custom-control custom-switch">
                    @if(isset($post->active) && $post->active == true || old('status') == true)
                    <input name="status" type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                    @else
                    <input name="status" type="checkbox" class="custom-control-input" id="customSwitch1">
                    @endif
                    <label class="custom-control-label" for="customSwitch1">Event Active?</label>
                </div>
                
                 
            </div>
            <div class="row m-0 p-3 w-100">
                <button type="submit" class="btn btn-primary ml-auto">Next</button>
            </div>
        </div>
           
    </form>

@endsection
