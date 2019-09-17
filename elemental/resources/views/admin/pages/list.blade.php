@extends('admin.base.base')

@section('content')
    <div class="row tools m-0 p-3 mb-4 align-items-center page-info">
        <div class="col col-md-5 mr-5 p-0">
            <h6 class=" m-0">Admin / Pages</h6>
            
        </div>
        
        <a class="btn btn-primary ml-auto" href="{{Route('pages_create')}}">
            Create Page <i class="fas fa-plus"></i>
        </a>
    </div>
    <div class="list">
         
      
        @foreach($pages as $page)
        
           <a href="{{Route('pages_update', ["id" => $page->id])}}" class="row">
                <div class=" bg-purple text-center py-3" style="width: 52px;">
                    <h6 class="text-white m-0">{{$page->title[0]}}</h6>
                </div>
                 <div class="col">
                    {{$page->title}}
                </div>
                <div class="col">
                    @if($page->slug == '/')
                        {{url('/')  .  $page->slug}}
                    @else
                        {{url('/') . '/' .  $page->slug}}
                    @endif
                </div>
                 <div class="col">
                    {{$page->description}}
                </div>
                 <div class="col">
                    {{$page->keywords}}
                </div>
                 <div class="col">
                    {{$page->created_at}}
                </div>
                 <div class="col">
                    {{$page->active == true ? "Active":"Inactive"}}
                </div>
            </a>
        @endforeach
   </div>
       

@endsection