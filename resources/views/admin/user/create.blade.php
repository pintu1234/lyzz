@extends('layouts.admin.main')
@section('title')
    My Blog | Add users
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Users
                <small>create new user</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active"><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{route('users.index')}}">Users</a></li>
                <li><a href="{{route('users.create')}}">Add new</a></li>

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
                        {!! Form::open(['method'=>'POST', 'action'=>'Backend\AdminUserController@store']) !!}
                        <div class="form-group {{$errors->has('name')? 'has-error': ''}}">
                           {!! Form::label('name') !!}
                           {!! Form::text('name', null, ['class'=>'form-control']) !!}

                            @if($errors->has('name'))
                                <span class="help-block">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('email')? 'has-error': ''}}">
                            {!! Form::label('email') !!}
                            {!! Form::text('email', null, ['class'=>'form-control']) !!}

                            @if($errors->has('email'))
                                <span class="help-block">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('password')? 'has-error': ''}}">
                            {!! Form::label('password') !!}
                            {!! Form::password('password',['class'=>'form-control']) !!}

                            @if($errors->has('password'))
                                <span class="help-block">{{$errors->first('password')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('password_confirmation')? 'has-error': ''}}">
                        {!! Form::label('password_confirmation', 'Confirm Password') !!}
                        {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}

                        @if($errors->has('password_confirmation'))
                            <span class="help-block">{{$errors->first('password_confirmation')}}</span>
                        @endif
                        </div>
                        <div class="form-group {{$errors->has('role')? 'has-error': ''}}">
                            {!! Form::label('role') !!}
                            {!! Form::select('role', App\Role::pluck('display_name', 'id'), null, ['class'=>'form-control', 'placeholder'=>'Select role']) !!}

                            @if($errors->has('role'))
                                <span class="help-block">{{$errors->first('role')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('bio') !!}
                            {!! Form::textarea('bio', null, ['rows'=>'3','class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                           {!! Form::submit('Create user', ['class'=>'btn btn-primary']) !!}
                            <a href="{{route('users.index')}}" class="btn btn-default">Back</a>
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

@endsection
