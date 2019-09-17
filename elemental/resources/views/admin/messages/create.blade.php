
    
@extends('admin.base.base')

@section('content')
    <div class="row tools m-0 p-3 mb-4 align-items-center page-info">
        <div class="col col-md-5 mr-5 p-0">
            <h6 class=" m-0">Admin / Messages / Message</h6>
            
        </div>
        
        @if(isset($page->id))
         <a class="btn btn-primary ml-auto" href="{{Route('messages_delete', ['id' => $page->id])}}">
            <i class="fas fa-trash"></i>
            Delete
        </a>
        @endif
        
    </div>
    
    <div class="row m-0 justify-content-start w-100">
        <div class="col-12 row pl-3 m-0 align-items-center">
            <h6 class="mb-0 mr-1">Name: </h6><p class="m-0">{{$page->name}}</p>
        </div>
         <div class="col-12 row pl-3 mt-3 m-0 align-items-center">
            <h6 class="mb-0 mr-1">Email: </h6><a href="mailto:{{$page->email}}" class="m-0">{{$page->email}}</a>
        </div>
         <div class="col-12 row pl-3 m-0 mt-3 align-items-center">
            <h6 class="mb-0 mr-1">Subject: </h6><p class="m-0">{{$page->subject}}</p>
        </div>
         <div class="col-12 row pl-3 m-0 mt-3 align-items-center">
            <h6 class="mb-0 mr-1">Message: </h6><p class="m-0">{{$page->message}}</p>
        </div>
      
    </div>
@endsection
