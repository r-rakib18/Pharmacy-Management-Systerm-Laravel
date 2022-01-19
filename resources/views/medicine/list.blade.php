@extends('layout')
@section('title', 'Medicine')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Medicine List
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="btn btn-sm btn-success" href="{{url('medicine/create')}}"><i class="fa fa-plus"></i> Medicine Add</a>
                            </li>
                        </ul>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Medicine Name</th>
                            <th>Generic Name</th>
                            <th>Group</th>
                            <th>Category</th>
                            <th>Manufacturers</th>
                            <th>Strength</th>
                            <th>Unit</th>
                            <th>Box</th>
                            {{--<th>Photo</th>--}}
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($medicines as $medicine)
                            <tr>
                                <td>{{$medicine->medicine_name}}</td>
                                <td>{{$medicine->generic_name}}</td>
                                <td>{{$medicine->group->name}}</td>
                                <td>{{$medicine->category->name}}</td>
                                <td>{{$medicine->manufacturer->name}}</td>
                                <td>{{$medicine->strength}}</td>
                                <td>{{$medicine->unit->name}}</td>
                                <td>{{$medicine->box_size}}</td>
                                {{-- <td><img src="{{asset('photo/'.$medicine->photo)}}" style="width: 100px;height: auto"></td> --}}
                                <td>
                                    <a href="{{url('medicine/edit?id='.$medicine->id)}}">Edit</a>
                                    <a href="{{url('medicine/delete?id='.$medicine->id)}}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="pagination pagination-sm m-0 float-right"> {{$medicines->render()}}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
