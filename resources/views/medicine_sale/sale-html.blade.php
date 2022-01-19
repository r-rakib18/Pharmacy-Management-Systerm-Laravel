<tr>
    <td>
        {!! Form::select('medicine_id[]',$medicines,null,['class'=>'form-control medicine_id','placeholder'=>'Select Medicine']) !!}
        <div class="text-danger medicine_id_{{$index}}"></div>
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
        {!! Form::number('price[]',null,['step' => '0.1','class'=>'form-control price','placeholder'=>'0.01']) !!}
        <div class="text-danger price_{{$index}}"></div>
    </td>
    <td>
        {!! Form::number('total_price[]',null,['step'=>'0.1','class'=>'form-control total_price']) !!}
        <div class="text-danger total_price{{$index}}"></div>
    </td>
    <td>
        <button type="button" class="btn btn-xs btn-success add"><i class="fa fa-plus"></i></button>
        <button type="button" class="btn btn-xs btn-danger remove"><i class="fa fa-minus"></i></button>
    </td>
</tr>