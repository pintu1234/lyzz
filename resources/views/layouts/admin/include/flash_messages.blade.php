{{--***
=======================================
 All flash messages of this application
======================================
***--}}
@if(session('post_create'))
    <p class="alert alert-info"><b>{{session('post_create')}}</b></p>
@endif
