@extends('site.base.base')

@section('content')

 @if(!is_null($page->fields()->where("name", 'jumbotron-image')->first()))
<div class="jumbotron jumbotron-fluid" style="background-image: url({{$page->fields()->where("name", 'jumbotron-image')->first()->value}})">
    <div class="row m-0 p-0">
       
    </div>
</div>

@else
<div class="jumbotron jumbotron-fluid" style="background-image: url({{url('/')}}/storage/media/banner.jpg);">
    
    <div class="row m-0 p-0">
       

        <form class="paypal-btn"  style="" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="TY8A3W7AD4TX2">
            <input style="height:60px;" type="image" src="https://bodyesteem.com/storage/media/ordernow.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>

    </div>
</div>
@endif

<section class="excerpt">
    <div class="container">
        <h3>
            @if(!is_null($page->fields()->where("name", 'intro-text')->first()))
            {!!$page->fields()->where("name", 'intro-text')->first()->value!!}
            @endif
        </h3>
        
    </div>
</section>
    <section class="intro">
        <div class="container">
             <div class="row">
                @if(!is_null($page->fields()->where("name", 'susan-image')->first()))
                    <div class="author" style="background: url({{$page->fields()->where("name", 'susan-image')->first()->value}}) 0 0 no-repeat;background-size:cover;"></div>
                @else
                     <div class="author" style="background: url({{url('/')}}/storage/media/susans_pic.png) 0 0 no-repeat;background-size:cover;"></div>
                @endif
                <div class="col-sm-12 col-md-8 bio">
                    @if(!is_null($page->fields()->where("name", 'author-info')->first()))
                    {!!$page->fields()->where("name", 'author-info')->first()->value!!}
                    @endif
                </div>
            </div>
        </div>
       
    </section>

    <section class="seminars">
        <div class="container">
            <div class="row m-0 p-0 py-5">
                @if(!is_null($page->fields()->where("name", 'seminar-series')->first()))
                    {!!$page->fields()->where("name", 'seminar-series')->first()->value!!}
                @endif
                
                @if(!is_null($page->fields()->where("name", 'wellness-center')->first()))
                    {!!$page->fields()->where("name", 'wellness-center')->first()->value!!}
                @endif
                
            </div>
            <div class="row m-0 p-0 seminars-body">
                @if(!is_null($page->fields()->where("name", 'cake')->first()))
                    <div class="author" style="background: url({{$page->fields()->where("name", 'cake')->first()->value}}) 0 0 no-repeat;background-size:cover;">
                @else
                     <div class="author" style="background: url({{url('/')}}/storage/media/icing.jpg) 0 0 no-repeat;background-size:cover;">
                @endif
                </div>
                <div class="col">
                    @if(!is_null($page->fields()->where("name", 'final-text')->first()))
                    {!!$page->fields()->where("name", 'final-text')->first()->value!!}
                    @endif
                     <form  style="margin-top: 3rem;" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="TY8A3W7AD4TX2">
                        <input type="image" style="height:50px;" src="https://bodyesteem.com/storage/media/ordernow.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    </form>

                </div>
            </div>
            
            <div class="row m-0 p-0 mt-5 mb-2">
                <ul class="nav flex-column w-100">
                    <li class="nav-item row m-0 p-0 align-items-center bg-primary p-3 mb-2">
                        <a class="nav-link" href="http://bodyesteem.com/storage/media/BodyEsteem_Recipes_190528.pdf">
                            <h6 class="m-0 text-white">Delicious and Delectable Bonus Recipes</h6>
                        </a>
                       
                    </li>
                    <li class="nav-item row m-0 p-0 align-items-center bg-primary p-3 mb-2">
                        <a class="nav-link" href="http://bodyesteem.com/storage/media/Body Esteem Scoring 2.docx">
                            <h6 class="m-0 text-white">Scoring for Emotional Eating Assessment (pages 28,29)</h6>
                        </a>
                       
                    </li>
                </ul>
            </div>
        </div>
       
    </section>
@endsection