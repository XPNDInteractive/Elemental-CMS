@include('admin.base.header')

@if(isset($nav) && $nav == true)
    @include('admin.base.nav')

    <div class="row m-0 page p-0">
        @if(isset($sidebar) && $sidebar == true)
            @include('admin.base.sidebar')
        @endif
        <div class="col content p-0">
            @yield('content')
        </div>
    </div>

@else
    <div class="row m-0 page page-fill p-0">
        @if(isset($sidebar) && $sidebar == true)
            @include('admin.base.sidebar')
        @endif
        <div class="col content p-0">
            @yield('content')
        </div>
    </div>
@endif

@include('admin.base.footer')

