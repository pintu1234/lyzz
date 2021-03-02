@extends('layouts.master')
@section('content')

@extends('layouts.sections.categoryList')
    <!-- Banner -->
    <div class="profile-content life_bg">
        "Whatever You Are Doing, Love Yourself For Doing It. Whatever You Are Feeling, Love Yourself For Feeling It." <br />
			<span class="mt-20">— Anonymous</span>
		</div>
	<div class="full-width life">
	
	</div>

    <!-- Latest Blogs -->
    <div class="full-width latest-blogs" style="padding: 0;">
        
        <div class="blogs-listing">
            {{--Search alert--}}
            @if($term = request('term'))
                <div class="alert alert-info">
                    <p>Search result for: <strong>{{$term}}</strong></p>
                </div>
            @endif
            
            
        </div>
    </div>
@endsection



