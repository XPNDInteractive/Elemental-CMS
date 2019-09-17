@extends('site.base.base')

@section('content')
    <section class="excerpt py-5 mt-5">
        <div class="container">
            
        </div>
    </section>
    
    <section class="blog py-5">
        <div class="container">
            
            <div class="row m-0 w-100 py-5 post mb-5 ">
                <div class="col-8 m-0  w-100 align-items-center">
                    <h1>{{$event->name}}</h1>
                     <p class="">{{$event->description}}</p>
                    <p class=""><span>Date/Time:</span> {{$event->datetime}}</p>
                    <p class=""><span>Location:</span> {{$event->address}}</p>
                    <p class=""><span>Phone:</span> {{$event->phone}}</p>
                    <p class=""><span>Email:</span> {{$event->email}}</p>

                    
                   
                </div>
                 <div class="col-4 p-0">
                     @if(!is_null($event->media()->first()))
                        <img class="w-100" src="{{$event->media()->first()->path}}"/>
                     @endif
                </div>


               
              
                
            </div>
          
           
        </div>
    </section>
   
@endsection