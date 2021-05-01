@extends('layouts.master')
@section('content')

@extends('layouts.sections.categoryList')
    <!-- Banner -->
    <div>
    <div class="profile-content food_bg">
        "You Can Have Whatever You Like." <br />
			<span class="mt-20">— Tip "T.I." Harris</span>
		</div></div>
	<div class="full-width food">
		
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



