@extends('layouts.admin.main')
@section('title')
    My Blog | Edit Categories
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Categories
                <small>Update categories</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active"><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{route('categories.index')}}">Categories</a></li>
                <li><a href="{{route('categories.edit',$category->id)}}">Edit Categories</a></li>

            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-header">
                            <div class="pull-left">

                            </div>
                            <div class="pull-right">

                            </div>
                        </div>
                        <div class="box-body ">
                            {!! Form::model($category,['method'=>'PATCH', 'action'=>['Backend\AdminCategoryController@update',$category->id]]) !!}
                            <div class="form-group {{$errors->has('title')? 'has-error': ''}}">
                                {!! Form::label('title') !!}
                                {!! Form::text('title', null, ['class'=>'form-control']) !!}

                                @if($errors->has('title'))
                                    <span class="help-block">{{$errors->first('title')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('slug')? 'has-error': ''}}">
                                {!! Form::label('slug') !!}
                                {!! Form::text('slug', null, ['class'=>'form-control']) !!}

                                @if($errors->has('slug'))
                                    <span class="help-block">{{$errors->first('slug')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Update', ['class'=>'btn btn-warning']) !!}
                                <a href="{{route('categories.index')}}" class="btn btn-default">Back</a>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                        </div>
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
    </script>
@endsection
