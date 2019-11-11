@extends('layouts.admin.main')
@section('title')
    My Blog | Create new post
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blogs
                <small>Create new post</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active"><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{route('blogs.index')}}">Blogs</a></li>
                <li><a href="#">Add new</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body ">
                            {!! Form::model($post, ['method'=>'PATCH', 'action'=>['Backend\AdminBlogController@update', $post->id], 'files'=>true ]) !!}
                            <div class="form-group {{$errors->has('title') ? 'has-error': ''}}">
                                {!! Form::label('title') !!}
                                {!! Form::text('title', null, ['class'=>'form-control']) !!}

                                @if($errors->has('title'))
                                    <span class="help-block">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('slug') ? 'has-error': ''}}">
                                {!! Form::label('slug') !!}
                                {!! Form::text('slug', null, ['class'=>'form-control']) !!}

                                @if($errors->has('slug'))
                                    <span class="help-block">{{ $errors->first('slug') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('excerpt') ? 'has-error': ''}}">
                                {!! Form::label('excerpt') !!}
                                {!! Form::textarea('excerpt', null, ['class'=>'form-control', 'rows'=>5]) !!}

                                @if($errors->has('excerpt'))
                                    <span class="help-block">{{ $errors->first('excerpt') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                                {!! Form::label('body') !!}
                                {!! Form::textarea('body', null, ['class'=>'form-control']) !!}

                                @if($errors->has('body'))
                                    <span class="help-block">{{ $errors->first('body') }}</span>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('published_at') ? 'has-error' : '' }}">
                                        {!! Form::label('published_at', 'Publish Date') !!}
                                        <div class='input-group date' id='datetimepicker1'>
                                            {!! Form::text('published_at', null, ['class'=>'form-control', 'placeholder'=>'Pick your date and time']) !!}
                                            <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                        </div>

                                        @if($errors->has('published_at'))
                                            <span class="help-block">{{ $errors->first('published_at') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                        {!! Form::label('image', 'Feature Image') !!}
                                        {!! Form::file('image', ['class'=>'form-control']) !!}

                                        @if($errors->has('image'))
                                            <span class="help-block">{{ $errors->first('image') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                                {!! Form::label('categpry_id', 'Category') !!}
                                {!! Form::select('category_id', App\Category::pluck('title', 'id'), null, ['class'=>'form-control', 'placeholder'=>'Choose category']) !!}

                                @if($errors->has('category_id'))
                                    <span class="help-block">{{ $errors->first('category_id') }}</span>
                                @endif
                            </div>
                            <hr>
                            <div class="form-group">
                                {!! Form::submit('Update Post', ['class'=>'btn btn-warning']) !!}
                            </div>
                            {!! Form::close() !!}

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        /*
        making slug automatically
        */
        $('#title').on('blur', function() {
            var theTitle = this.value.toLowerCase().trim(),
                slugInput = $('#slug');
            theSlug = theTitle.replace(/&/g, '-and-')
                .replace(/[^a-z$0-9-]+/g, '-')
                .replace(/\-\-+/g, '-')
                .replace(/^-+|-+$/g, '')

            slugInput.val(theSlug);
        });

        /*
        jQuery code for simple MDE
        */
        var simplemdeExcerpt = new SimpleMDE({
            element: $("#excerpt")[0],
            spellChecker: false,
            hideIcons: ['guide', 'fullscreen', 'image', 'link', 'side-by-side'],
            showIcons: [ 'undo', 'redo'],
        });
        var simplemdeBody = new SimpleMDE({
            element: $("#body")[0] ,
            hideIcons: ['guide', 'fullscreen', 'image', 'link', 'side-by-side'],
            showIcons: [ 'undo', 'redo'],
            placeholder: 'Write your blog here'
        });

        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            showClear:true
        });
    </script>
@endsection
