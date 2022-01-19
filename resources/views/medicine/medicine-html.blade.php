<tr>
    <td>
        {!! Form::text('medicine_name[]',null,['class'=>'form-control']) !!}
        <div class="text-danger medicine_name_{{$index}}"></div>
    </td>
    <td>
        {!! Form::text('generic_name[]',null,['class'=>'form-control']) !!}
        <div class="text-danger generic_name_{{$index}}"></div>
    </td>
    <td>
        {!! Form::select('manufacturer_id[]',$manufacturers,null,['class'=>'form-control','placeholder'=>'Select Manufacturers']) !!}
        <div class="text-danger manufacturer_id_{{$index}}"></div>
    </td>
    <td>
        {!! Form::text('strength[]',null,['class'=>'form-control']) !!}
        <div class="text-danger strength_{{$index}}"></div>
    </td>
    <td>
        {!! Form::select('unit_id[]',$units,null,['class'=>'form-control','placeholder'=>'Select Units']) !!}
        <div class="text-danger unit_id_{{$index}}"></div>
    </td>
    <td>
        {!! Form::text('box_size[]',null,['class'=>'form-control']) !!}
        <div class="text-danger box_size_{{$index}}"></div>
    </td>
    <td>
        <button type="button" class="btn btn-xs btn-success add"><i class="fa fa-plus"></i></button>
        <button type="button" class="btn btn-xs btn-danger remove"><i class="fa fa-minus"></i></button>
    </td>
</tr>