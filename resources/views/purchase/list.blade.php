@extends('layout')
@section('title', 'Purchase')
@section('content')
    <style>
        .table-custom {
            width: 100%;
            border: 1px solid #ccc;
        }

        .table-custom thead tr th {
            width: 11% !important;
            border: 1px solid #ccc;
            padding: 5px;
            white-space: nowrap;
        }

        .table-custom thead tr, .table-custom tbody tr td {
            padding: 5px;
            border: 1px solid #ccc;
        }

        .table-custom thead tr th:last-child {
            width: 5% !important;
            text-align: center;
        }

        .table-custom tbody tr td:last-child {
            text-align: center;
        }
    </style>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Filter</h3>
                </div>
                <div class="card-body">
                    {!! Form::open(['url'=>'purchase-search','method'=>'get']) !!}
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
                        Purchase List
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="btn btn-sm btn-success" href="{{url('purchase/create')}}"><i class="fa fa-plus"></i> Purchase Add</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-sm btn-warning" href="{{url('purchase/pdf-download?search_column='.Request::get('search_column').'&search_string='.Request::get('search_string'))}}"><i class="fa fa-download"></i> PDF</a>
                            </li>
                        </ul>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table-custom">
                            <thead>
                            <tr>
                                <th>Manufacturer</th>
                                <th>Purchase Date</th>
                                <th>Invoice No</th>
                                <th>Payment Type</th>
                                <th>Medicine</th>
                                <th>Batch</th>
                                <th>Expire Date</th>
                                <th>Unit</th>
                                <th>Quantity</th>
                                <th>Manufacture Price</th>
                                <th>Retail Price</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($purchase_list as $item)
                                <tr>
                                    <td>{{$item->medicine->manufacturer->name}}</td>
                                    <td>{{date('d-M-Y',strtotime($item->purchase_master_data->purchase_date))}}</td>
                                    <td>{{$item->purchase_master_data->invoice_no}}</td>
                                    <td>{{$item->purchase_master_data->payment_type == 1 ? 'Cash' : 'Due'}}</td>
                                    <td>{{$item->medicine->medicine_name}}</td>
                                    <td>{{$item->batch}}</td>
                                    <td>{{date('d-M-Y',strtotime($item->expire_date))}}</td>
                                    <td>{{$item->unit->name}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->manufacture_price}}</td>
                                    <td>{{$item->retail_price}}</td>
                                    <td>{{$item->total}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{--<div class="pagination pagination-sm m-0 float-right"> {{$purchase_list->render()}}</div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection