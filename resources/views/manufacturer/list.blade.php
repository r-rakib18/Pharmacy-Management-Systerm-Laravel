@extends('layout')
@section('title', 'Manufacturer')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        manufacturer List
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="btn btn-sm btn-success" href="{{url('manufacturer/create')}}"><i class="fa fa-plus"></i> Create Manufacturer</a>
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
                        @foreach($manufacturers as $manufacturer)
                            <tr>
                                <td>{{$manufacturer->name}}</td>
                                <td>
                                    <a href="{{url('manufacturer/edit?id='.$manufacturer->id)}}"><i class="fas fa-edit"></i></a>
                                    <a href="{{url('manufacturer/delete?id='.$manufacturer->id)}}"><i class="fas fa-trash" style="color: red;"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="pagination pagination-sm m-0 float-right"> {{$manufacturers->render()}}</div>
                </div>
            </div>
        </div>
    </div>
@endsection