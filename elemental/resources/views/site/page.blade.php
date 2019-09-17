@extends('site.base.base')

@section('content')
    <section class="excerpt py-5 mt-5">
        <div class="container">
            
        </div>
    </section>
    
    <section class="py-5 w-100">
       
        <div class="container">
            @foreach($fields as $field)
                @if($field->type !== "image")
                    {!!$field->value!!}
                @else
                    <img class="w-100 mb-5" src="{{$field->value}}"/>
                @endif
            @endforeach
        </div>
       
    </section>
   
@endsection