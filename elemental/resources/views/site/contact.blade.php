@extends('site.base.base')

@section('content')
    <section class="excerpt py-5 mt-5">
        <div class="container">
            
        </div>
    </section>
    
    <section class="contact py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-6">
                    @if(!is_null($page->fields()->where("name", 'contact-message')->first()))
                        {!!$page->fields()->where("name", 'contact-message')->first()->value!!}
                    @endif
                </div>
                <div class="col-sm-12 col-md-6 p-5 border">
                    <h4>Send a message</h4>
                    <p>Please fee free to contact us with any questions or concerns you might have.  </p>
                    <form method="post" action="{{Route('mail')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="first & last name" value="{{old('name')}}"/>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                        <label>Email</label>
                        <input class="form-control  {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="youremail@email.com" value="{{old('email')}}"/>
                         @if ($errors->has('email'))
                            <span class="invalid-feedback d-block" role="alert">
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            </span>
                        @endif
                        </div>
                        <div class="form-group">
                        <label>Subject</label>
                        <input class="form-control {{ $errors->has('subject') ? ' is-invalid' : '' }}" name="subject" placeholder="subject" value="{{old('subject')}}"/>
                        @if ($errors->has('subject'))
                            <span class="invalid-feedback d-block" role="alert">
                                <p class="text-danger">{{ $errors->first('subject') }}</p>
                            </span>
                        @endif
                        </div>
                        <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control {{ $errors->has('message') ? ' is-invalid' : '' }}" name="message"  value="{{old('message')}}"></textarea>
                        @if ($errors->has('message'))
                            <span class="invalid-feedback d-block" role="alert">
                                <p class="text-danger">{{ $errors->first('message') }}</p>
                            </span>
                        @endif
                        </div>
                        <div class="row m-0">
                            <button type="submit" class="btn btn-primary ml-auto">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
   
@endsection