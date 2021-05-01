@extends('layouts.master')
@section('content')

@extends('layouts.sections.categoryList')
    <!-- Banner -->
    <div class="profile-content silverlinings_bg">
        "Whatever Satisfies The Soul is Truth." <br />
			<span class="mt-20">— Walt Whitman</span>
		</div>
	<div class="full-width silverlinings">
	
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



