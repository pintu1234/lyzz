@extends('layouts.admin.main')
@section('title')
    My Blog | index
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
                <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body ">
                        @if($posts)
                          <table class="table table-responsive table-hover">
                            <thead>
                              <tr>
                                <th scope="col" width="80">Action</th>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Category</th>
                                <th scope="col">Date</th>
                              </tr>
                            </thead>
                          @foreach($posts as $post)
                          <tbody>
                          <tr>
                              <td>
                                  <a href="#" class="btn btn-xs btn-default">
                                      <i class="fa fa-edit"></i>
                                  </a>
                                  <a href="#" class="btn btn-xs btn-danger">
                                      <i class="fa fa-times"></i>
                                  </a>
                              </td>
                              <td>{{$post->title}}</td>
                              <td>{{$post->author->name}}</td>
                              <td>{{$post->category->title}}</td>
                              <td>{{$post->created_at->diffForHumans()}}</td>
                          </tr>
                          </tbody>
                          @endforeach
                          </table>
                         @endif
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <div class="pull-left">
                                <ul class="pagination no-margin">
                                    {{$posts->render()}}
                                </ul>
                            </div>
                            <div class="pull-right">
                                <small>
                                    <?php $postsCount = $posts->count();?>
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

