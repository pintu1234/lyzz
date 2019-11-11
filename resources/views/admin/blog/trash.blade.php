@extends('layouts.admin.main')
@section('title')
    My Blog | Index
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Trash Blogs
                <small>Display all trash posts</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active"><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{route('blogs.index')}}">Blogs</a></li>
                <li><a href="{{route('blogs.index')}}">All posts</a></li>
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
                                <a href="{{route('blogs.index')}}">All</a> |
                                <a href="{{route('blogs.published')}}">Published</a> |
                                <a href="{{route('blogs.schedule')}}">Schedule</a> |
                                <a href="{{route('blogs.draft')}}">Draft</a> |
                                <a href="{{route('blogs.trash')}}" class="text-danger">Trash</a>
                            </div>
                        </div>
                        <div class="box-body ">

                            @include('layouts.admin.include.flash_messages')

                            @if(! $trashes->count())
                                <div class="alert alert-warning"><b>No trash post found</b></div>
                            @else
                                <table class="table table-responsive table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col" width="80">Action</th>
                                        <th scope="col">Title</th>
                                        <th scope="col" width="150">Author</th>
                                        <th scope="col" width="150">Category</th>
                                        <th scope="col" width="150">Trashed Date</th>
                                    </tr>
                                    </thead>
                                    @foreach($trashes as $post)
                                        <tbody>
                                        <tr>
                                            <td>
                                                {!! Form::open(['style'=>'display:inline-block','method'=>'PUT', 'action'=> ['Backend\AdminBlogController@restore', $post->id]]) !!}
                                                <button type="submit" class="btn btn-xs btn-primary" title="Restore"><i class="fa fa-undo"></i></button>
                                                {!! Form::close() !!}

                                                {!! Form::open(['style'=>'display:inline-block','method'=>'DELETE', 'action'=>['Backend\AdminBlogController@forceDelete', $post->id]]) !!}
                                                <button type="submit" class="btn btn-xs btn-danger" title="Delete permanently">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                                {!! Form::close() !!}
                                            </td>
                                            <td>{{$post->title}}</td>
                                            <td>{{$post->author->name}}</td>
                                            <td>{{$post->category->title}}</td>
                                            <td>{{$post->deleted_at->diffForHumans()}}</td>
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
                                    {{$trashes->render()}}
                                </ul>
                            </div>
                            <div class="pull-right">
                                <small>
                                    {{$trashCount}} {{str_plural('trash', $trashCount)}}
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

