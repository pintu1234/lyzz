@extends('layouts.master')
@section('content')

@extends('layouts.sections.categoryList')
    <!-- Banner -->
    <div class="profile-content wellness_bg">
        "Whatever You Think The World is Withholding From You, You Are Withholding From The World."<br />
			<span class="mt-20">— Eckhart Tolle</span>
		</div>
	<div class="full-width wellness">
		
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



