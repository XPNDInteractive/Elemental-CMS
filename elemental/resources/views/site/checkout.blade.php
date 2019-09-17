@extends('site.base.base')

@section('content')
    <section class="excerpt py-5 mt-5">
        <div class="container">
            
        </div>
    </section>
    
    <section class="contact py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    @if(!is_null($page->fields()->where("name", 'checkout-message')->first()))
                        {!!$page->fields()->where("name", 'checkout-message')->first()->value!!}
                    @endif
                </div>
                <div class="col-sm-12 p-5 border">
                    <h4>Your Order</h4>
                    
                    <ul class="list-group rounded-0 mt-3">
                        <li class="list-group-item p-3 rounded-0">
                            <div class="row m-0">
                                <h6 class="m-0">Body Esteem - Piece of cake & Piece of mind</h6>
                                <h6 class="m-0 ml-auto">$27.95</h6>
                            </div>
                           
                        </li>
                        <li class="list-group-item rounded-0">
                            <div class="row m-0">
                                <h6 class="m-0 text-muted"> - Shipping & Handling</h6>
                                <h6 class="m-0 ml-auto">$4.00</h6>
                            </div>
                        </li>
                        <li class="list-group-item rounded-0">
                            <div class="row m-0">
                                
                                <h6 class="m-0 ml-auto">$31.95</h6>
                            </div>
                        </li>
                    </ul>
                    
                    <div class="row m-0">
                       <form class="ml-auto mt-4" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="ZNTHQSZASJVM8">
                        <input type="image" src="http://bodyesteem.com/storage/media/btn-checkout.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
   
@endsection