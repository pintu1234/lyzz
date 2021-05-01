{{--***
=======================================
 All flash messages of this application
======================================
***--}}
@if(session('create_message'))
    <p class="alert alert-info"><b>{{session('create_message')}}</b></p>
@endif
@if(session('update_message'))
    <p class="alert alert-warning"><b>{{session('update_message')}}</b></p>
@endif

@if(session('delete_message'))
    <p class="alert alert-danger"><b>{{session('delete_message')}}</b></p>
@endif
@if(session('trash_message'))
    <?php list($message, $postId) = session('trash_message') ?>
    {!! Form::open(['method'=>'PUT', 'action'=> ['Backend\AdminBlogController@restore', $postId]]) !!}
        <p class="alert alert-danger">
            <b>{{session('message', 'Your post is moved into trash !')}}</b>
            <button type="submit" class="btn btn-xs btn-primary"><i class="fa fa-undo"></i> undo</button>
        </p>
    {!! Form::close() !!}
@endif

@if(session('restore_message'))
    <p class="alert alert-info"><b>{{session('restore_message')}}</b></p>
@endif
