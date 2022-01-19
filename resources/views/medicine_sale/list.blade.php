@extends('layout')
@section('title', 'Medicine Sale')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            {{--search section--}}
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Filter</h3>
                </div>
                <div class="card-body">
                    {!! Form::open(['url'=>'medicine_sale_search','method'=>'get']) !!}
                    <div class="row">
                        <div class="col-3">
                            {!! Form::select('search_column',$search_column,null,['class'=>'form-control search_column','placeholder'=>'Select Column']) !!}
                        </div>
                        <div class="col-4">
                            {!! Form::text('search_string',null,['class'=>'form-control','placeholder'=>'Search String']) !!}
                        </div>
                        <div class="col-5">
                            <button type="submit" class="btn btn-md btn-success">Search</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <!-- /.card-body -->
            </div>


            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Medicine sale List
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="btn btn-sm btn-success" href="{{url('medicine_sale/create')}}"><i class="fa fa-plus"></i>Create Medicine Sale</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-sm btn-warning" href="{{url('medicine_sale/pdf-download?search_column='.Request::get('search_column').'&search_string='.Request::get('search_string'))}}"><i class="fa fa-download"></i> PDF</a>
                            </li>
                        </ul>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Medicine Name</th>
                            <th>Unit</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($medicine_sale_list as $item)
                            <tr>
                                <td>{{$item->medicine->medicine_name}}</td>
                                <td>{{$item->unit->name}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->total_price}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{--<div class="card-footer">--}}
                    {{--<div class="pagination pagination-sm m-0 float-right"> {{$medicine_sale_list->render()}}</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
@endsection