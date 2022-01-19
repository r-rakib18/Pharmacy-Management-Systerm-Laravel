@extends('layout')
@section('title', 'Medicine Stock')
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
                    {!! Form::open(['url'=>'medicine/stock-report','method'=>'get']) !!}
                    <div class="row">
                        {{--<div class="col-3">--}}
                        {{--{!! Form::select('search_column',$search_column,null,['class'=>'form-control search_column','placeholder'=>'Select Column']) !!}--}}
                        {{--</div>--}}
                        <div class="col-4">
                            {!! Form::month('month',null,['class'=>'form-control','placeholder'=>'Search String']) !!}
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
                        Medicine Stock
                    </h3>

                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table-custom">
                            <thead>
                            <tr>
                                <th>Medicine</th>
                                <th>Total Purchase</th>
                                <th>Total Sale</th>
                                <th>Total Stock</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($results))
                                @foreach($results as $result)
                                    @php
                                        $total_purchase = $result->purchase->where('medicine_id',$result->id)->sum('quantity');
                                        $total_sale = $result->transaction->where('medicine_id',$result->id)->sum('sale_qty');
                                    @endphp
                                    <tr>
                                        <td>{{$result->medicine_name}}</td>
                                        <td>{{$total_purchase}}</td>
                                        <td>{{$total_sale}}</td>
                                        <td>{{($total_purchase - $total_sale)}}</td>
                                    </tr>
                                @endforeach
                            @endif
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