@extends('layout')
@section('title', $medicine ? 'Update' : 'Create' .' Medicine')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card card-primary">
                {!! Form::model($medicine, ['url' => $medicine ? 'medicine/'.$medicine->id.'/update' : 'medicine/store', 'method' => $medicine ? 'PUT' : 'POST','files'=>true,'class'=>'medicine-create']) !!}
                <div class="card-header">
                    <h3 class="card-title">Medicine Form</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="group_id">Group Name <dfn class="text-danger">*</dfn></label>
                            {!! Form::select('group_id',$groups,null,['class'=>'form-control','placeholder'=>'Select Group']) !!}
                            <div class="text-danger group_id"></div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="category_id">Category Name <dfn class="text-danger">*</dfn></label>
                            {!! Form::select('category_id',$categories,null,['class'=>'form-control','placeholder'=>'Select Category']) !!}
                            <div class="text-danger category_id"></div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="table-responsive">
                            @include('medicine.partial')
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
        $(function () {
            var i = 1;
            $('body').on('click', '.add', function () {
                var index = i++;
                $.ajax({
                    type: 'get',
                    url: '{{url('get-medicine-html')}}',
                    data: {index: index},
                    context: this,
                    success: function (data) {
//                        $(this).parents('tr').after(data);
                        var $tableBody = $('.medicine_table').find("tbody");
                        var $trLast = $tableBody.find("tr:last");
                        $trLast.after(data);
                    }
                });
            });
            $('body').on('click', '.remove', function () {
                --i;
                $(this).parents('tr').remove();
            });

            /* ajax form submit */

            $('.form-submit').on('click', function () {
                var form_data = $('.medicine-create').serialize();
                var form_url = $('.medicine-create').attr('action');
                var form_method = $('.medicine-create').attr('method');
                $.ajax({
                    type: form_method,
                    url: form_url,
                    data: form_data,
                    dataType: "json",
                    success: function (data) {
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(data.message, 3, function () {
                            window.location.href = '{{url('medicine/list')}}'
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

        });
    </script>
@endpush