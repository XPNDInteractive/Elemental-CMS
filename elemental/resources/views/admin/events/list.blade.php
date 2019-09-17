@extends('admin.base.base')

@section('content')
    <div class="row tools m-0 p-3 mb-4 align-items-center page-info">
        <div class="col col-md-5 mr-5 p-0">
            <h6 class=" m-0">Admin / Events</h6>
            
        </div>
        
        <a class="btn btn-primary ml-auto" href="{{Route('events_create')}}">
            Create Event <i class="fas fa-plus"></i>
        </a>
    </div>
    <div class="list">

        
       
        @foreach($pages as $page)
        
           <a href="{{Route('events_update', ["id" => $page->id])}}" class="row">
                <div class=" bg-purple text-center py-3" style="width: 52px;">
                    <h6 class="text-white m-0">{{strtoupper($page->name[0])}}</h6>
                </div>
                 <div class="col-2">
                    {{$page->name}}
                </div>
                <div class="col-4">
                    {!!str_limit($page->description, 155)!!}
                </div>
                 <div class="col">
                    {{$page->address}}
                </div>
                 <div class="col">
                    {{$page->phone}}
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