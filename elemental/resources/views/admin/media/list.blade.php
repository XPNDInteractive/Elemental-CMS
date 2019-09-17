@extends('admin.base.base')

@section('content')
    <div class="list">
         <div class="row tools mb-4 align-items-center">
            <div class="col col-md-5 mr-5 p-0">
                <h6>Media</h6>
                <p>This is where you manage your website pages.  You can create, update and delete as many pages as your website needs.</p>
            </div>
            <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#mediaUpload">
            Upload Media <i class="fas fa-plus"></i>
            </button>
           <button type="button" class="btn btn-primary ml-1" data-toggle="modal" data-target="#mediaLink">
            Link Media <i class="fas fa-plus"></i>
            </button>
        </div>
       
      
        
        <div class="row gallery">
            @foreach($media as $asset)
                <div class="col-6 col-sm-6 col-md-4 col-lg-3 gallery-item">
                    @if($asset->type == "image")
                    <img class="w-100" src="{{$asset->path}}"/>

                    @elseif($asset->type == "video")
                        <video class="w-100 h-100" src="{{$asset->path}}" autoplay></video>
                    @elseif($asset->type == "youtube")
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/3E78T8h5EhA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @endif
                </div>
                @endforeach
        </div>
       
   </div>

<div class="modal fade {{$errors->has('file') ? "input-errors":null}}" id="mediaUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{Route('media_upload')}}" method="post" enctype="multipart/form-data">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Media Upload</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="custom-file mt-3">
             @csrf
            <input name="file" type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
        <p>Please do not use any special characters in your title.  Please make your title clear and related to the intended content.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" type="button" class="btn btn-primary">Upload</button>
      </div>
    </div>
    </form>
  </div>
</div>

<div class="modal fade {{$errors->has('media_url') ? "input-errors":null}}" id="mediaLink" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     <form action="{{Route('media_link')}}" method="post" enctype="multipart/form-data">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Media Link</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-3">
            @csrf
            <label>Media URL</label>
            <input name="media_url" type="text" class="form-control {{ $errors->has('media_url') ? ' is-invalid' : '' }}" id="basic-url" aria-describedby="basic-addon3" value="{{old('media_url')}}">
            
            
            @if ($errors->has('media_url'))
                <span class="invalid-feedback d-block" role="alert">
                    <p class="text-danger">{{ $errors->first('media_url') }}</p>
                </span>
            @endif
            <p>Please do not use any special characters in your title.  Please make your title clear and related to the intended content.</p>
            
           <div class="custom-control custom-radio">
                <input type="radio" id="customRadio1" name="type" class="custom-control-input" value="" checked>
                <label class="custom-control-label" for="customRadio1">Image</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio2" name="type" class="custom-control-input">
                <label class="custom-control-label" for="customRadio2">Video</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio3" name="type" class="custom-control-input">
                <label class="custom-control-label" for="customRadio3">Youtube</label>
            </div>
              @if ($errors->has('type'))
                <span class="invalid-feedback d-block" role="alert">
                    <p class="text-danger">{{ $errors->first('type') }}</p>
                </span>
            @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Link</button>
      </div>
      </form>
    </div>
  </div>
</div>

@endsection