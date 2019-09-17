@extends('site.base.base')

@section('content')


@if(!is_null($page->fields()->where("name", 'blog-image')->first()))
    <div class="jumbotron jumbotron-fluid jumbotron-blog" style="background-image: url({{$page->fields()->where("name", 'blog-image')->first()->value}})"></div>
@else
    <div class="jumbotron jumbotron-fluid jumbotron-blog"  style="background: url({{url('/')}}/storage/media/blog.jpg) 0 0 no-repeat;background-size:cover;"></div>
@endif
<section class="excerpt py-5">
    <div class="container"></div>
</section>
<section class="blog py-5">
    <div class="container">
            @foreach($posts as $post)
            <div class="row m-0 w-100 py-5 post">
                    @if(!is_null($post->media()->first()))
                <div class="col-4">
                    <a href="{{$post->slug}}">
                    
                    <img class="w-100" src="{{$post->media()->first()->path}}"/>
                    
                    </a>
                </div>
                @endif
                <div class="col">
                    <h1><a href="{{url('/') . "/". $post->slug}}">{{$post->title}}</a></h1>
                    
                    
                    
                    <p class="mb-3">{!!str_limit(strip_tags($post->content), 355, $end = '...')!!}</p>
                    <p class="details w-100">Created by <span>{{$post->users()->first()->name}}</span> on <span>{{$post->created_at}}</span></p>
                </div>
            </div>
        @endforeach
        {{$posts->links()}}
    </div>
</section>
   
@endsection