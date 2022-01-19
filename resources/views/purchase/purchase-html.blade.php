<tr>
    <td>

        {!! Form::select('medicine_id[]',$medicines,null,['class'=>'form-control medicine_id','placeholder'=>'Select Medicine']) !!}
        <div class="text-danger medicine_id_{{$index}}"></div>
    </td>
    <td>
        {!! Form::text('batch[]',null,['class'=>'form-control']) !!}
        <div class="text-danger batch_{{$index}}"></div>
    </td>
    <td>
        {!! Form::date('expire_date[]',null,['class'=>'form-control']) !!}
        <div class="text-danger expire_date_{{$index}}"></div>
    </td>
    <td>
        {!! Form::select('unit_id[]',[],null,['class'=>'form-control unit_id','placeholder'=>'Select Unit']) !!}
        <div class="text-danger unit_id_{{$index}}"></div>
    </td>
    <td>
        {!! Form::number('quantity[]',null,['step' => '0.1','class'=>'form-control quantity','placeholder'=>'0.01']) !!}
        <div class="text-danger quantity_{{$index}}"></div>
    </td>
    <td>
        {!! Form::number('manufacture_price[]',null,['step' => '0.1','class'=>'form-control manufacture_price','placeholder'=>'0.01']) !!}
        <div class="text-danger manufacture_price_{{$index}}"></div>
    </td>
    <td>
        {!! Form::number('retail_price[]',null,['step' => '0.1','class'=>'form-control retail_price','placeholder'=>'0.01']) !!}
        <div class="text-danger retail_price_{{$index}}"></div>
    </td>
    <td>
        {!! Form::number('total[]',null,['step' => '0.1','class'=>'form-control total']) !!}
        <div class="text-danger total_{{$index}}"></div>
    </td>
    <td>

        <button type="button" class="btn btn-xs btn-success add"><i class="fa fa-plus"></i></button>
        <button type="button" class="btn btn-xs btn-danger remove"><i class="fa fa-minus"></i></button>
    </td>
</tr>