@extends('layout')
@section('title', 'Unit')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Unit List
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="btn btn-sm btn-success" href="{{url('unit/create')}}"><i class="fa fa-plus"></i> Create Unit</a>
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
                        @foreach($units as $unit)
                            <tr>
                                <td>{{$unit->name}}</td>
                                <td>
                                    <a href="{{url('unit/edit?id='.$unit->id)}}"><i class="fas fa-edit"></i></a>
                                    <a href="{{url('unit/delete?id='.$unit->id)}}"><i class="fas fa-trash" style="color: red;"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="pagination pagination-sm m-0 float-right"> {{$units->render()}}</div>
                </div>
            </div>
        </div>
    </div>
@endsection