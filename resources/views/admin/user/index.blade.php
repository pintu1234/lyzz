@extends('layouts.admin.main')
@section('title')
    My Blog | Users
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Users
                <small>Display all users</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active"><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{route('users.index')}}">Users</a></li>

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
                                <a href="{{route('users.create')}}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add new</a>
                            </div>
                            <div class="pull-right">

                            </div>
                        </div>
                        <div class="box-body ">
                         @include('layouts.admin.include.flash_messages')
                         @if(! $users->count())
                            <p class="alert alert-warning">No user found</p>
                         @else
                            <table class="table table-responsive">
                            <thead>
                            <tr>
                              <th scope="col">Action</th>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Role</th>
                              <th scope="col">Posts count</th>
                            </tr>
                            </thead>
                            @foreach($users as $user)
                            <tbody>
                            <tr>
                              <td>
                                  {!! Form::open(['method'=>'DELETE', 'action'=>['Backend\AdminUserController@destroy', $user->id ]]) !!}

                                  <a href="{{route('users.edit', $user->id)}}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>

                                  @if($user->posts()->count() <= 0)
                                  <button type="submit" onclick="return confirm('User will delete permanentlly. Are you sure to delete??')" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                                  @else
                                      <button type="submit" onclick="return false" class="btn btn-danger btn-sm disabled"><i class="fa fa-times"></i></button>
                                  @endif
                                  {!! Form::close() !!}
                              </td>
                              <td>{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>{{ucwords($user->roles()->first()? $user->roles()->first()->name : "")}}</td>
                              <td>{{$user->posts()->count()}}</td>
                            </tr>
                            </tbody>
                            @endforeach
                            </table>
                          @endif
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <div class="pull-left">
                                <ul class="pagination">

                                </ul>
                            </div>
                            <div class="pull-right">
                                <small>
                                    {{$userCount}} {{str_plural('User', $userCount)}}
                                </small>
                            </div>
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
        $('ul.pagination').addClass('no-margin pagination-sm');
    </script>
@endsection

