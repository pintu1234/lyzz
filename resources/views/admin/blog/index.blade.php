@extends('layouts.admin.main')
@section('title')
    My Blog | Index
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blogs
                <small>Display all blog posts</small>
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
                                <a href="{{route('blogs.create')}}" class="btn btn-success">Add new</a>
                            </div>
                        </div>
                        <div class="box-body ">

                        @include('layouts.admin.include.flash_messages')

                        @if(! $posts)
                          <div class="alert alert-warning"><b>No post found</b></div>
                        @else
                          <table class="table table-responsive table-hover">
                            <thead>
                              <tr>
                                <th scope="col" width="80">Action</th>
                                <th scope="col">Title</th>
                                <th scope="col" width="150">Author</th>
                                <th scope="col" width="150">Category</th>
                                <th scope="col" width="200">Create Date</th>
                                <th scope="col" width="150">Published Date</th>
                              </tr>
                            </thead>
                          @foreach($posts as $post)
                          <tbody>
                          <tr>
                              <td>
                                  <a href="#" class="btn btn-xs btn-default" title="edit">
                                      <i class="fa fa-edit"></i>
                                  </a>
                                  <a href="#" class="btn btn-xs btn-danger" title="delete">
                                      <i class="fa fa-times"></i>
                                  </a>
                              </td>
                              <td>{{$post->title}}</td>
                              <td>{{$post->author->name}}</td>
                              <td>{{$post->category->title}}</td>
                              <td>
                                  <abbr title="{{$post->dateFormatted(true)}}">{{$post->dateFormatted()}}</abbr>
                                  {!! $post->publicationLabel() !!}
                              </td>
                              <td>{{$post->published_at? $post->published_at->diffForHumans(): 'Not set'}}</td>
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
                                    {{$posts->render()}}
                                </ul>
                            </div>
                            <div class="pull-right">
                                <small>
                                    {{$postsCount}} {{str_plural('post', $postsCount)}}
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

