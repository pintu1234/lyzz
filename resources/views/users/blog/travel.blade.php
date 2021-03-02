@extends('layouts.master')
@section('content')

@extends('layouts.sections.categoryList')
    <!-- Banner -->
    <div class="profile-content travel_bg">
        "Whatever You Want To Do, Do It Now. There Are Only So Many Tomorrows."<br />
			<span class="mt-20">— Michael London </span>
		</div>
	<div class="full-width travel">
		
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



