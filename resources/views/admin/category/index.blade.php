@extends('layouts.admin.main')
@section('title')
    My Blog | Categories
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Categories
                <small>Display all categories</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active"><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{route('categories.index')}}">Categories</a></li>

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
                                <a href="{{route('categories.create')}}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add new</a>
                            </div>
                            <div class="pull-right">

                            </div>
                        </div>
                        <div class="box-body ">
                         @include('layouts.admin.include.flash_messages')
                         @if(! $categories->count())
                            <p class="alert alert-warning">No category found</p>
                         @else
                            <table class="table table-responsive">
                            <thead>
                            <tr>
                              <th scope="col">Action</th>
                              <th scope="col">Category Name</th>
                              <th scope="col">Posts count</th>
                            </tr>
                            </thead>
                            @foreach($categories as $category)
                            <tbody>
                            <tr>
                              <td>
                                  {!! Form::open(['method'=>'DELETE', 'action'=>['Backend\AdminCategoryController@destroy', $category->id ]]) !!}

                                  <a href="{{route('categories.edit', $category->id)}}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                                  @if($category->posts()->count() <= 0)
                                  <button type="submit" onclick="return confirm('Category will delete permanentlly. Are you sure to delete??')" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                                  @else
                                      <button type="submit" onclick="return false" class="btn btn-danger btn-sm disabled"><i class="fa fa-times"></i></button>
                                  @endif
                                  {!! Form::close() !!}
                              </td>
                              <td>{{$category->title}}</td>
                              <td>{{$category->posts()->count()}}</td>
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
                                    {{$categoryCount}} {{str_plural('Category', $categoryCount)}}
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

