@extends('admin.base.base')

@section('content')
    <div class="list">
         <div class="row tools mb-4 align-items-center">
            <div class="col col-md-5 mr-5 p-0">
                <h6>Pages</h6>
                <p>This is where you manage your website pages.  You can create, update and delete as many pages as your website needs.</p>
            </div>
            <a href="{{url('/admin/pages/create')}}" class="btn btn-danger ml-auto text-white"><i class="fas fa-plus"></i></a>
        </div>
        <div class="row filters mb-4">
            <form class="form-inline col-sm-8 col-md-6 p-0" action="/admin/pages">
                <label>Search:</label>
                <input class="form-control" type="text" name="search" placeholder="search"/>
                <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i></button>
            </form>
            <form class="form-inline col-sm-8 col-md-6  p-0">
                <label class="ml-md-auto mt-sm-5 mt-md-0">Sort By: </label>
                <select class="custom-select">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <button type="submit" class="btn btn-danger"><i class="fas fa-arrow-right"></i></button>
            </form>
            
        </div>
        @foreach($pages as $page)
        
           <a class="row">
                <div class=" bg-danger text-center py-3" style="width: 52px;">
                    <h6 class="text-white m-0">{{$page->title[0]}}</h6>
                </div>
                 <div class="col">
                    {{$page->title}}
                </div>
                <div class="col">
                    {{url('/') . $page->slug}}
                </div>
                 <div class="col">
                    {{$page->description}}
                </div>
                 <div class="col">
                    {{$page->keywords}}
                </div>
                 <div class="col">
                    {{$page->active == true ? "Active":"Inactive"}}
                </div>
            </a>
        @endforeach
   </div>

@endsection