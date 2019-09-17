@extends('site.base.base')

@section('content')



    <section class="excerpt mt-5 py-5">
        <div class="container">
            
        </div>
    </section>
    <section class="blog py-5">
        <div class="container post">
            <h1>Body Esteem Events & Seminars</h1>
             @foreach($events as $event)
                <div class="row m-0 w-100 py-5 post">
                    @if(!is_null($event->media()->first()))
                    <div class="col-4">
                        <a href="{{$event->slug}}">
                       
                        <img class="w-100" src="{{$event->media()->first()->path}}"/>
                       
                        </a>
                    </div>
                    @endif
                    <div class="col">

                        <h1><a href="{{$event->slug}}">{{$event->name}}</a></h1>
                        <p class="">{{$event->description}}</p>
                        <p class=""><span>Date/Time:</span> {{$event->datetime}}</p>
                        <p class=""><span>Location:</span> {{$event->address}}</p>
                        <p class=""><span>Phone:</span> {{$event->phone}}</p>
                        <p class=""><span>Email:</span> {{$event->email}}</p>
                    </div>
                </div>
            @endforeach
            @if($posts->count() > 5)
                {{$posts->links()}}
            @endif
        </div>
    </section>
   
@endsection