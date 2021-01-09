@extends('layouts.master')
@section('content')
    <!-- Contact -->
    <div class="full-width contact-container">
        <h1>Contact</h1>
        <form>
            <ul>
                <li><input type="text" placeholder="YOUR NAME" name="full_name" id="contact_name" onkeypress="remove_error(this.id)"></li>
                <li><input type="email" placeholder="EMAIL" name="email" id="contact_email" onkeypress="remove_error(this.id)"></li>
                <li><input type="tel" placeholder="PHONE" name="phone" id="contact_number" onkeypress="remove_error(this.id)" maxlength="15"></li>
                <li><textarea placeholder="MESSAGE"></textarea></li>
                <li><a id="contact_btn">SUBMIT</a></li>
            </ul>
        </form>
    </div>

    <!-- Latest Blogs -->
    <div class="full-width latest-blogs">
        <h1>LATEST ON THE BLOG</h1>
        <div class="blogs-listing">
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
            <ul class="blogs-listing-bxslider">
                @if(! $posts->count())
                    <div class="alert alert-warning">
                        No post found!
                    </div>
                @else
                    @foreach($posts as $post)
                        @if($post->imageUrl)
                            <li>
                                <a href="{{ route('blog.show', $post->id)}}">
                                    <div class="img-container">
                                        <div class="date">{{$post->date}}</div>
                                        <img src="{{$post->imageUrl ? $post->imageUrl: 'placeholder.png'}}" />
                                    </div>
                                    <h2>{{$post->title}}</h2>
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
@endsection
