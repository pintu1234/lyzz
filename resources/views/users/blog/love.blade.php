@extends('layouts.master')
@section('content')

@extends('layouts.sections.categoryList')
    <!-- Banner -->
    <div class="profile-content love_bg">
        "Whatever is Done For Love Occurs Beyond Good And Evil."<br />
			<span class="mt-20">— Fredrich Nietzche</span>
		</div>
	<div class="full-width love">
		
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



