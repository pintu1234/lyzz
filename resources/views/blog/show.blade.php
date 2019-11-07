@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post-item post-detail">

                    @if($post->imageUrl)
                    <div class="post-item-image">
                        <a href="#">
                            <img src="{{$post->imageUrl}}" alt="">
                        </a>
                    </div>
                    @endif

                    <div class="post-item-body">
                        <div class="padding-10">
                            <h1>{{$post->title}}</h1>

                            <div class="post-meta no-border">
                                <ul class="post-meta-group">
                                    <li><i class="fa fa-user"></i><a href="{{route('author', $post->author->id)}}"> {{$post->author->name}}</a></li>
                                    <li><i class="fa fa-clock-o"></i><time> {{$post->date}}</time></li>
                                    <li><i class="fa fa-tags"></i><a href="{{route('category', $post->category->slug)}}"> {{$post->category->title}}</a></li>
                                    <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                                </ul>
                            </div>

                            <p>{!! $post->body_html !!}</p>
                        </div>
                    </div>
                </article>

                <article class="post-author padding-10">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img width="80" alt="{{$post->author->name}}" src="{{$post->author->gravatar()}}" class="media-object">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="{{route('author', $post->author->id)}}">{{$post->author->name}}</a></h4>
                            <div class="post-author-count">
                                <a href="{{route('author', $post->author->id)}}">
                                    <i class="fa fa-clone"></i>
                                    <?php $postCount = $post->author->posts()->published()->count()?>
                                    {{$postCount}} {{ str_plural('post', $postCount) }}
                                </a>
                            </div>
                            <p>{!! Markdown::convertToHtml(e($post->author->bio)) !!}</p>
                        </div>
                    </div>
                </article>

               {{--Comment Here--}}

            </div>

            @include('layouts.sidebar')
        </div>
    </div>
@endsection
