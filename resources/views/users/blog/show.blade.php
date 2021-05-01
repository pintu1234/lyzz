@extends('layouts.master')
@section('title')
    My blog - {{$post->title}}
@endsection

@section('content')
    <!-- Blog Page -->
    <div class="full-width blog-page">
        <div class="full-width blog-post">
            <div class="breadcrumb-menu">
                <a>Home</a><a>Style</a><b>{{$post->title}}</b>
            </div>
            <div class="content-sidebar">
                <!-- Blog Content -->
                <div class="blog-content">
                    <figure>
                        @if($post->imageUrl)
                            <img src="{{$post->imageUrl}}" />
                        @endif
                        </figure>
                    <div class="category-name">{{$post->category->name}}</div>
                    <h2>{{$post->title}}</h2>
                    <div class="description line-clamp">
                        <p>{!! $post->body_html !!}</p>
                    </div>

                    <ul class="full-width post-details">
                        <li><span class="author">{{$post->author->name}}</span>, <span class="date">{{$post->date}}</span></li>
                        <li><a><i class="icon-comment-alt"></i> {{$post->commentNumber()}}</a></li>
                        <li><i class="icon-time"></i> 1 min read</li>
                    </ul>
                    @include('users.blog.comments')
                </div>

                <!-- Blog Sidebar -->
                <div class="blog-sidebar">

                    <h2>Today's Pick</h2>
                    <ul class="full-width todays-pick-listing">
                        <li>
                            <figure><img src="{{ asset('images/pic-1.jpg') }}" /></figure>
                            <div class="sidebar-post-content">
                                <a>5 Ways Animals Will Help You Get More Business</a>
                                <ul class="full-width sidebar-post-details">
                                    <li><a><i class="icon-comment-alt"></i> 1</a></li>
                                    <li><i class="icon-time"></i> 1 min read</li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <figure><img src="images/pic-1.jpg" /></figure>
                            <div class="sidebar-post-content">
                                <a>5 Ways Animals Will Help You Get More Business</a>
                                <ul class="full-width sidebar-post-details">
                                    <li><a><i class="icon-comment-alt"></i> 1</a></li>
                                    <li><i class="icon-time"></i> 1 min read</li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <figure><img src="{{ asset('images/pic-1.jpg') }}" /></figure>
                            <div class="sidebar-post-content">
                                <a>5 Ways Animals Will Help You Get More Business</a>
                                <ul class="full-width sidebar-post-details">
                                    <li><a><i class="icon-comment-alt"></i> 1</a></li>
                                    <li><i class="icon-time"></i> 1 min read</li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <figure><img src="{{ asset('images/pic-1.jpg') }}" /></figure>
                            <div class="sidebar-post-content">
                                <a>5 Ways Animals Will Help You Get More Business</a>
                                <ul class="full-width sidebar-post-details">
                                    <li><a><i class="icon-comment-alt"></i> 1</a></li>
                                    <li><i class="icon-time"></i> 1 min read</li>
                                </ul>
                            </div>
                        </li>
                    </ul>

                    <h2>Hot Topics</h2>
                    <ul class="full-width todays-pick-listing">
                        <li>
                            <figure><img src="{{ asset('images/pic-1.jpg') }}" /></figure>
                            <div class="sidebar-post-content">
                                <a>5 Ways Animals Will Help You Get More Business</a>
                                <ul class="full-width sidebar-post-details">
                                    <li><a><i class="icon-comment-alt"></i> 1</a></li>
                                    <li><i class="icon-time"></i> 1 min read</li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <figure><img src="{{ asset('images/pic-1.jpg') }}" /></figure>
                            <div class="sidebar-post-content">
                                <a>5 Ways Animals Will Help You Get More Business</a>
                                <ul class="full-width sidebar-post-details">
                                    <li><a><i class="icon-comment-alt"></i> 1</a></li>
                                    <li><i class="icon-time"></i> 1 min read</li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <figure><img src="{{ asset('images/pic-1.jpg') }}" /></figure>
                            <div class="sidebar-post-content">
                                <a>5 Ways Animals Will Help You Get More Business</a>
                                <ul class="full-width sidebar-post-details">
                                    <li><a><i class="icon-comment-alt"></i> 1</a></li>
                                    <li><i class="icon-time"></i> 1 min read</li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <figure><img src="{{ asset('images/pic-1.jpg') }}" /></figure>
                            <div class="sidebar-post-content">
                                <a>5 Ways Animals Will Help You Get More Business</a>
                                <ul class="full-width sidebar-post-details">
                                    <li><a><i class="icon-comment-alt"></i> 1</a></li>
                                    <li><i class="icon-time"></i> 1 min read</li>
                                </ul>
                            </div>
                        </li>
                    </ul>

                    <h2>Stay Connected</h2>
                    <div class="full-width stay-connected">
                        <a class="facebook">
                            <span class="social-title"><i class="icon-facebook"></i> Like</span>
                            <span class="social-count">1423</span>
                        </a>
                        <a class="twitter">
                            <span class="social-title"><i class="icon-twitter"></i> Follow</span>
                            <span class="social-count">727</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('css')
    <link type="text/css" href="{{ asset('css/blog.css') }}" rel="stylesheet">
@endpush
@push('scripts')
    <script type="text/javascript" src="{{ asset('js/blog.js') }}"></script>
@endpush
