@extends('layout')
@section('title', $medicine_sale ? 'Update' : 'Create' .' Medicine Sale')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card card-primary">
                {!! Form::model($medicine_sale, ['url' => $medicine_sale ? 'medicine_sale/'.$medicine_sale->id.'/update' : 'medicine_sale/store', 'method' => $medicine_sale ? 'PUT' : 'POST','files'=>true, 'class'=>'medicine-sale']) !!}
                <div class="card-header">
                    <h3 class="card-title">Medicine Sale Form</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center"> Medicine Name <dfn class="text-danger">*</dfn></th>
                                <th class="text-center">Unit <dfn class="text-danger">*</dfn></th>
                                <th class="text-center">Quantity <dfn class="text-danger">*</dfn></th>
                                <th class="text-center">Price <dfn class="text-danger">*</dfn></th>
                                <th class="text-center">Total Price <dfn class="text-danger"></dfn>*</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>
                                            {!! Form::select("medicine_id[]",$medicines,null,['class'=>'form-control medicine_id', 'placeholder' => 'Select Medicine']) !!}
                                            <div class="text-danger medicine_id_0"></div>
                                        </td>
                                        <td>
                                            {!! Form::select('unit_id[]',[],null,['class'=>'form-control unit_id','placeholder'=>'Select Unit']) !!}
                                            <div class="text-danger unit_id_0"></div>
                                        </td>
                                        <td>
                                            {!! Form::number('quantity[]',null,['step' => '0.1','class'=>'form-control quantity','placeholder'=>'0.01']) !!}
                                            <div class="text-danger quantity_0"></div>
                                        </td>
                                        <td>
                                            {!! Form::number('price[]',null,['step' => '0.1','class'=>'form-control price','placeholder'=>'0.01']) !!}
                                            <div class="text-danger price_0"></div>
                                        </td>
                                        <td>
                                            {!! Form::number('total_price[]',null,['step' => '0.1','class'=>'form-control total_price']) !!}
                                            <div class="text-danger total_price_0"></div>
                                        </td>
                                        <td>
                                            @if(!$medicine_sale)
                                                <button type="button" class="btn btn-xs btn-success add"><i class="fa fa-plus"></i></button>
                                                <button type="button" class="btn btn-xs btn-danger d-none remove"><i class="fa fa-minus"></i></button>
                                            @endif
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary form-submit"><i class="fa fa-arrow-circle-right"></i> Submit</button>
                    <a href="{{url('medicine_sale/list')}}" class="btn btn-danger"><i class=""></i> Cancel</a>
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
                $.ajax({
                    type: 'get',
                    url: '{{url('sale-html')}}',
                    data: {index: index},
                    context: this,
                    success: function (data) {
                        $(this).parents('tr').after(data);
                    }
                });
            });
            $('body').on('click', '.remove', function () {
                --i;
                $(this).parents('tr').remove();
            });

            /* ajax form submit */

            $('.form-submit').on('click', function () {
                var form_data = $('.medicine-sale').serialize();
                var form_url = $('.medicine-sale').attr('action');
                var form_method = $('.medicine-sale').attr('method');
                $.ajax({
                    type: form_method,
                    url: form_url,
                    data: form_data,
                    dataType: "json",
                    success: function (data) {
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(data.message, 3, function () {
                            window.location.href = '{{url('medicine_sale/list')}}'
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
                url: '{{url('get_unit_by_medicine')}}',
                data: {medicine_id: medicine_id},
                context: this,
                success: function (data) {
                    $(this).parents('tr').find('.unit_id').html(data);
                }
            });
        });

        /* calculation */

       $('body').on('keyup', '.quantity, .price', function () {
            var quantity = $(this).parents('tr').find('.quantity').val();
           var price = $(this).parents('tr').find('.price').val();
           var total_price = Number(quantity) * Number(price);
          $(this).parents('tr').find('.total_price').val(total_price);
       });
    </script>
@endpush