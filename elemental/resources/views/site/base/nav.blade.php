 <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand">{{$siteTitle}}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    @if(isset($menu))
                        @foreach($menu as $link)
                            <li class="nav-item"><a class="nav-link" href="{{$link->path}}">{{$link->name}}</a></li>
                        @endforeach
                    @endif

                    @if(!is_null(Auth::user()))
                        <li class="nav-item"><a class="nav-link" href="/admin">Admin Panel</a></li>
                    @endif
                </ul>
                <ul class="navbar-nav ml-5">
                    <li class="nav-item ml-0"><a class="nav-link p-0" href="https://www.facebook.com/BodyEsteemBook/"><i class="fab fa-facebook"></i></a></li>
                    <li class="nav-item ml-3"><a class="nav-link p-0 ml-0" href="https://twitter.com/SusanWa26770554"><i class="fab fa-twitter"></i></a></li>
                    <li class="nav-item ml-3"><a class="nav-link p-0 ml-0" href="https://www.instagram.com/bodyesteembook/"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>