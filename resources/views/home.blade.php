@extends('layouts.master')
@section('content')

@extends('layouts.sections.categoryList')
	<!-- Banner -->
	<div class="full-width banner">
		<div class="profile-content">
			With fame comes opportunity, but it also includes responsibility to advocate and share, to focus less on glass slippers and more on pushing through glass ceilings.<br />
			<span class="mt-20">— LYZZ</span><br>
			<img src="./images/signature.svg" class="signature">
		</div>
	</div>

    <!-- Latest Blogs -->
    <div class="full-width latest-blogs mt-130">
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



