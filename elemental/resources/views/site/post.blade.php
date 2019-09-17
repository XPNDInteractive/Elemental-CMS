@extends('site.base.base')

@section('content')
    <section class="excerpt py-5 mt-5">
        <div class="container">
            
        </div>
    </section>
    
    <section class="blog py-5">
        <div class="container">
            
            <div class="row m-0 w-100 py-5 post ">
                  <div class="row m-0  w-100 align-items-center">
                    <h1>{{$post->title}}</h1>
                    <p class="ml-auto">Created by <span>{{$post->users()->first()->name}}</span> on <span>{{$post->created_at}}</span></p>
                    
                   
                </div>
                <div class="col-12 p-0">
                     @if(!is_null($post->media()->first()))
                        <img class="w-100" src="{{$post->media()->first()->path}}"/>
                     @endif
                </div>
              
                <p class="mt-5">{!!$post->content!!}</p>
            </div>
          
           
        </div>
    </section>
   
@endsection