@extends('layout')
@section('title', $purchase ? 'Update' : 'Create' .' Purchase')
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
            <div class="card card-primary">
                {!! Form::model($purchase, ['url' => $purchase ? 'purchase/'.$purchase->id.'/update' : 'purchase/store', 'method' => $purchase ? 'PUT' : 'POST','files'=>true,'class'=>'purchase-create']) !!}
                <div class="card-header">
                    <h3 class="card-title">Purchase Form</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="group_id">Manufacturer Name <dfn class="text-danger">*</dfn></label>
                            {!! Form::select('manufacturer_id',$manufacturers,null,['class'=>'form-control manufacturer_id','placeholder'=>'Select Manufacturer']) !!}
                            <div class="text-danger manufacturer_id"></div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="group_id">Purchase Date <dfn class="text-danger">*</dfn></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                {!! Form::date('purchase_date',null,['class'=>'form-control'])!!}
                            </div>
                            <div class="text-danger purchase_date"></div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="group_id">Invoice NO <dfn class="text-danger">*</dfn></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-invoice-dollar"></i></span>
                                </div>
                                {!! Form::text('invoice_no',null,['class'=>'form-control','placeholder'=>'Invoice NO']) !!}
                            </div>
                            <div class="text-danger invoice_no"></div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="category_id">Payment Type <dfn class="text-danger">*</dfn></label>
                            {!! Form::select('payment_type',['1' => 'Cash','2'=>'Due'],null,['class'=>'form-control','placeholder'=>'Select Payment']) !!}
                            <div class="text-danger payment_type"></div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="table-responsive">
                            @include('purchase.partial')
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary form-submit"><i class="fa fa-arrow-circle-right"></i> Submit</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@push('script-head')
    <script>
        var i = 1;
        $('body').on('click', '.add', function () {
            var index = i++;
            var manufacturer_id = $('.manufacturer_id').val();
            $.ajax({
                type: 'get',
                url: '{{url('get-purchase-html')}}',
                data: {index: index, manufacturer_id: manufacturer_id},
                context: this,
                success: function (data) {
                    var $tableBody = $('.purchase_table').find("tbody");
                    var $trLast = $tableBody.find("tr:last");
                    $trLast.after(data);
                }
            });
        });
        $('body').on('click', '.remove', function () {
            --i;
            $(this).parents('tr').remove();
        });

        $('.form-submit').on('click', function () {
            var form_data = $('.purchase-create').serialize();
            var form_url = $('.purchase-create').attr('action');
            var form_method = $('.purchase-create').attr('method');
            $.ajax({
                type: form_method,
                url: form_url,
                data: form_data,
                dataType: "json",
                success: function (data) {
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(data.message, 3, function () {
                        window.location.href = '{{url('purchase/list')}}'
                    });
                }, error: function (data) {
                    $('body').find('.text-danger').html(' ');
                    $.each(data.responseJSON.errors, function (key, value) {
                        var class_name = key.replace(".", "_");
                        $('body').find('.' + class_name).html(value[0]);
                    });
                }
            });
        });

        /* get unit by medicine */

        $('body').on('change', '.medicine_id', function () {
            var medicine_id = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{url('get-unit-by-medicine')}}',
                data: {medicine_id: medicine_id},
                context: this,
                success: function (data) {
                    $(this).parents('tr').find('.unit_id').html(data);
                }
            });
        });

        /* calculation */

        $('body').on('keyup', '.quantity, .retail_price', function () {
            var quantity = $(this).parents('tr').find('.quantity').val();
            var retail_price = $(this).parents('tr').find('.retail_price').val();
            var total = Number(quantity) * Number(retail_price);
            $(this).parents('tr').find('.total').val(total);
        });

    </script>

@endpush