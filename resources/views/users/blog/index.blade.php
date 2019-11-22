@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {{--Search alert--}}
                @if($term = request('term'))
                    <div class="alert alert-info">
                        <p>Search result for: <strong>{{$term}}</strong></p>
                    </div>
                @endif
                @if(isset($tagName))
                    <div class="alert alert-info">
                        <p>Post from <strong>{{$tagName}}</strong></p>
                    </div>
                @endif
                @if(! $posts->count())
                    <div class="alert alert-warning">
                       No post found!
                    </div>
                @else
                @foreach($posts as $post)
                <article class="post-item">
                   @if($post->imageUrl)
                    <div class="post-item-image">
                        <a href="{{ route('blog.show', $post->id)}}">
                            <img src="{{$post->imageUrl ? $post->imageUrl: 'placeholder.png'}}" alt="">
                        </a>
                    </div>
                   @endif
                    <div class="post-item-body">
                        <div class="padding-10">
                            <h2><a href="{{ route('blog.show', $post->id)}}">{{$post->title}}</a></h2>
                            <p>{!! Markdown::convertToHtml(e($post->excerpt)) !!}</p>
                        </div>

                        <div class="post-meta padding-10 clearfix">
                            <div class="pull-left">
                                <ul class="post-meta-group">
                                    <li><i class="fa fa-user"></i><a href="{{route('author', $post->author->id)}}">{{$post->author->name}}</a></li>
                                    <li><i class="fa fa-clock-o"></i><time>{{$post->date}}</time></li>
                                    <li><i class="fa fa-folder"></i><a href="{{route('category', $post->category->slug)}}"> {{$post->category->slug}}</a></li>
                                    <li><i class="fa fa-tags"></i>
                                        @foreach($post->tags as $tag)
                                        <a href="{{route('tag', $tag->slug)}}">{{$tag->name}}, </a>
                                        @endforeach
                                    </li>
                                    <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                                </ul>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('blog.show', $post->id)}}">Continue Reading &raquo;</a>
                            </div>
                        </div>
                    </div>
                </article>
                @endforeach
                @endif

                <nav class="text-center">
                        {{$posts->appends(request()->only(['term']))->render()}}
                </nav>
            </div>

            @include('layouts.sidebar')
        </div>
    </div>
@endsection



