@extends('layout')
@section('title', 'Category List')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Category List
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="btn btn-sm btn-success" href="{{url('category/create')}}"><i class="fa fa-plus"></i> Create Category</a>
                            </li>
                        </ul>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>
                                    <a href="{{url('category/edit?id=' .$category->id)}}"><i class="fas fa-edit"></i></a>
                                    <a href="{{url('category/delete?id=' .$category->id)}}"><i class="fas fa-trash" style="color: red"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="pagination pagination-sm m-0 float-right"> {{$categories->render()}}</div>
                </div>
            </div>
        </div>
    </div>
    @endsection