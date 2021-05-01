@extends('layouts.master')
@section('content')

@extends('layouts.sections.categoryList')
	<!-- Banner -->
	<div class="full-width banner">
		<div class="profile-content">
        <span class="mt-20">Welcome to Whatever, Lyzz</span><br>
        I want to start off by saying that Whatever, Lyzz isn’t a lifestyle blog. It isn’t a place where we will tell you the best places to eat, “it” fashions of today, the fantastic traveling spots you should book. We won’t even give you tips on your love life. Whatever, Lyzz is more of a digital journal, a safe space.<br><br>

It is a place where its owner, and at times guest writers share their real-life experiences. The things they are learning, evolving from, the changes they are making. During these candid moments, you will learn of the incredible food they’ve indulged in. Their amazing finds. Their travel stories. You will even know of their love lives. The things they regret. The truths they wish someone had told them.<br><br>

In this space, all will be discussed and delve into. There will be no topic off-limits. There will be no shame of who we once were and who we wish to become. Most importantly, we will embrace who we are right now, the things available to us at this moment. Whatever, Lyzz is a place where Lyzz gets to say whatever comes to mind. Unadulterated, Unpretentious, Unbothered, Unapologetic.<br><br>

This is a safe space. A virtual room where we get to say what’s important (or unimportant) to us. A space where we get to be versions of ourselves that we hide from the world. Hopefully, in these sharing, you will see yourself, you’ll find laughter, the strength to try new things, or flourish. Maybe you’ll cry those tears that you’re so afraid of drowning in. Perhaps you’ll just stand still, and that’s okay. As long as you’re standing in your truth.<br><br>

So welcome, and we hope that whatever it is you find is just what your soul needed. 

<br /><span>—<img src="./images/signature1.svg" class="signature"></span>
		</div>
	</div>

    <!-- Latest Blogs -->
    <!-- <div class="full-width latest-blogs mt-130">
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
    </div> -->
@endsection



