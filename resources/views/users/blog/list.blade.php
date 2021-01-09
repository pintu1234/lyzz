@extends('layouts.master')
@section('content')

    <!-- Blog Page -->
    <div class="full-width blog-page">
        <div class="full-width blog-listing">
            <h1>Welcome to our Blog</h1>

            <div class="search-category">
                <div class="category-search" id="blog-category-search">
                    <a>Search <i class="icon-caret-down"></i></a>
                    <div class="category-list" id="blog-category-list">
                        <input type="text" placeholder="Search" />
                        <ul>
                            <li><a>Category Name-1</a></li>
                            <li><a>Category Name-2</a></li>
                            <li><a>Category Name-3</a></li>
                            <li><a>Category Name-4</a></li>
                            <li><a>Category Name-5</a></li>
                            <li><a>Category Name-6</a></li>
                            <li><a>Category Name-7</a></li>
                            <li><a>Category Name-8</a></li>
                            <li><a>Category Name-9</a></li>
                            <li><a>Category Name-10</a></li>
                        </ul>
                    </div>
                </div>
                <div class="selected-category" id="blog-selected-category-list"></div>
            </div>

            <div id="blog-pages-container">
                <div class="current">
                    <ul class="blogs-container">
                        @foreach($posts as $key=>$post)
                            @if($post->imageUrl)
                                <li>
                                    <a href="{{ route('blog.show', $post->id)}}">
                                        <figure>
                                            <img src="{{$post->imageUrl ? $post->imageUrl: 'placeholder.png'}}" />
                                        </figure>
                                        <div class="category-name">{{$post->category->name}}</div>
                                        <h2>{{$post->title}}</h2>
                                        <div class="description line-clamp">
                                            <p>{!! $post->body_html !!}</p>
                                        </div>
                                        <ul class="full-width post-details">
                                            <li><span class="author">{{$post->author->name}}</span>, <span class="date">{{$post->date}}</span></li>
                                            <li><a><i class="icon-comment-alt"></i> {{count($post->comments)}}</a></li>
{{--                                            <li><i class="icon-time"></i> 1 min read</li>--}}
                                        </ul>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div>
                    <ul class="blogs-container">
                        <li>
                            <a href="blog-post.html">
                                <figure><img src="images/pic-7.jpg" /></figure>
                                <div class="category-name">Category Name</div>
                                <h2>Meghan and Catherine attend Wimbledon final with Pippa</h2>
                                <div class="description line-clamp">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                </div>
                                <ul class="full-width post-details">
                                    <li><span class="author">Meghan</span>, <span class="date">4 years ago</span></li>
                                    <li><a><i class="icon-comment-alt"></i> 1</a></li>
                                    <li><i class="icon-time"></i> 1 min read</li>
                                </ul>
                            </a>
                        </li>
                        <li>
                            <a href="blog-post.html">
                                <figure><img src="images/pic-2.jpg" /></figure>
                                <div class="category-name">Category Name</div>
                                <h2>Meghan’s Girls’ Day out at Wimbledon</h2>
                                <div class="description line-clamp">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                </div>
                                <ul class="full-width post-details">
                                    <li><span class="author">Meghan</span>, <span class="date">4 years ago</span></li>
                                    <li><a><i class="icon-comment-alt"></i> 1</a></li>
                                    <li><i class="icon-time"></i> 1 min read</li>
                                </ul>
                            </a>
                        </li>
                        <li>
                            <a href="blog-post.html">
                                <figure><img src="images/pic-3.jpg" /></figure>
                                <div class="category-name">Category Name</div>
                                <h2>Meghan &amp; Harry’s snowy day visit to Bristol</h2>
                                <div class="description line-clamp">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                </div>
                                <ul class="full-width post-details">
                                    <li><span class="author">Meghan</span>, <span class="date">4 years ago</span></li>
                                    <li><a><i class="icon-comment-alt"></i> 1</a></li>
                                    <li><i class="icon-time"></i> 1 min read</li>
                                </ul>
                            </a>
                        </li>
                        <li>
                            <a href="blog-post.html">
                                <figure><img src="images/pic-5.jpg" /></figure>
                                <div class="category-name">Category Name</div>
                                <h2>Meghan and Catherine attend Wimbledon final with Pippa</h2>
                                <div class="description line-clamp">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                </div>
                                <ul class="full-width post-details">
                                    <li><span class="author">Meghan</span>, <span class="date">4 years ago</span></li>
                                    <li><a><i class="icon-comment-alt"></i> 1</a></li>
                                    <li><i class="icon-time"></i> 1 min read</li>
                                </ul>
                            </a>
                        </li>
                        <li>
                            <a href="blog-post.html">
                                <figure><img src="images/pic-1.jpg" /></figure>
                                <div class="category-name">Category Name</div>
                                <h2>Meghan and Catherine attend Wimbledon final with Pippa</h2>
                                <div class="description line-clamp">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                </div>
                                <ul class="full-width post-details">
                                    <li><span class="author">Meghan</span>, <span class="date">4 years ago</span></li>
                                    <li><a><i class="icon-comment-alt"></i> 1</a></li>
                                    <li><i class="icon-time"></i> 1 min read</li>
                                </ul>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="blog-pagination-controls">
                <button id="prev-btn" disabled="true">Prev</button>
                <span id="pageNumbers">
				</span>
                <button id="next-btn">Next</button>
            </div>
        </div>
    </div>

@endsection

@push('css')
    <link type="text/css" href="{{ asset('css/blog.css') }}" rel="stylesheet">
@endpush
@push('scripts')
    <script type="text/javascript" src="{{ asset('js/blog.js') }}"></script>
    <script>
        $(document).ready(function() {

            var list_length = $('#blog-pages-container > div');
            var index_no;
            var tot_length = list_length.length - 1;

            for (i = 0; i < list_length.length; i++) {
                $('#pageNumbers').append("<a>" + (i + 1) + "</a>");
            }

            $('#pageNumbers a:first-child').addClass('selected');

            function check_prev(index_no) {
                if (index_no == 0) {
                    $('#prev-btn').attr('disabled', 'disabled');
                } else {
                    $('#prev-btn').removeAttr('disabled');
                }
            };

            function check_next(index_no) {
                if (index_no == tot_length) {
                    $('#next-btn').attr('disabled', 'disabled');
                } else {
                    $('#next-btn').removeAttr('disabled');
                }
            };

            $('.blog-pagination-controls a').click(function() {
                $('.blog-pagination-controls a').removeClass('selected');
                $(this).addClass('selected');
                var num = $(this).text() - 1;
                $('#blog-pages-container > div').removeClass('current');
                $('#blog-pages-container > div').eq(num).addClass('current');
                var index_no = $('#blog-pages-container  > div.current').index();
                check_prev(index_no);
                check_next(index_no);
            });

            $('#prev-btn').click(function() {

                /* Change page*/
                var currentPage = $('#blog-pages-container  > div.current');
                $('#blog-pages-container > div').removeClass('current');
                $(currentPage).prev().addClass('current');
                var index_no = $('#blog-pages-container > div.current').index();

                /* Change Number*/
                var currentNum = $('.blog-pagination-controls a.selected');
                $('.blog-pagination-controls a').removeClass('selected');
                $(currentNum).prev().addClass('selected');

                setTimeout(function(){
                    $('html, body').animate({ scrollTop: 0 },1200);
                },200);

                check_prev(index_no);
                check_next(index_no);
            });

            $('#next-btn').click(function() {

                /* Change page*/
                var currentPage = $('#blog-pages-container > div.current');
                $('#blog-pages-container > div').removeClass('current');
                $(currentPage).next().addClass('current');
                var index_no = $('#blog-pages-container > div.current').index();

                /* Change Number*/
                var currentNum = $('.blog-pagination-controls a.selected');
                $('.blog-pagination-controls a').removeClass('selected');
                $(currentNum).next().addClass('selected');

                setTimeout(function(){
                    $('html, body').animate({ scrollTop: 0 },1200);
                },200);

                check_next(index_no);
                check_prev(index_no);
            });

        });

    </script>
@endpush


