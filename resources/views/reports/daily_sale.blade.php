@extends('layout')
@section('title', 'Daily Medicine Sale')
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
                    {!! Form::open(['url'=>'medicine/daily_sale_report','method'=>'get']) !!}
                    <div class="row">
                        {{--<div class="col-3">--}}
                        {{--{!! Form::select('search_column',$search_column,null,['class'=>'form-control search_column','placeholder'=>'Select Column']) !!}--}}
                        {{--</div>--}}
                        <div class="col-4">
                            {!! Form::date('date',null,['class'=>'form-control','placeholder'=>'Search String']) !!}
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
                        Daily Medicine Sale
                    </h3>

                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table-custom">
                            <thead>
                            <tr>
                                <th>Medicine</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($daily_sales))
                                <?php $total = 0;?>
                                @foreach($daily_sales as $daily_sale)
                                    <tr>
                                        <td>{{$daily_sale->first()->medicine->medicine_name}}</td>
                                        <td>{{$daily_sale->sum('quantity')}}</td>
                                        <td>{{$daily_sale->first()->price}}</td>
                                        <td>{{($daily_sale->sum('total_price'))}}</td>
                                    </tr>
                                    <?php $total += $daily_sale->sum('total_price');?>
                                @endforeach
                                <tr>
                                    <td colspan="3" class="text-center">Total</td>
                                    <td>{{$total}}</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{--<div class="pagination pagination-sm m-0 float-right"> {{$daily_sales->render()}}</div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection