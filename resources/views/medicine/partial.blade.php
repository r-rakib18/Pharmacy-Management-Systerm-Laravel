<table class="table table-bordered medicine_table">
    <thead>
    <tr>
        <th>Medicine Name <dfn class="text-danger">*</dfn></th>
        <th>Generic Name <dfn class="text-danger">*</dfn></th>
        <th>Manufacturer <dfn class="text-danger">*</dfn></th>
        <th>Strength <dfn class="text-danger">*</dfn></th>
        <th>Unit <dfn class="text-danger">*</dfn></th>
        <th>Box Size <dfn class="text-danger">*</dfn></th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
            {!! Form::text('medicine_name[]',null,['class'=>'form-control']) !!}
            <div class="text-danger medicine_name_0"></div>
        </td>
        <td>
            {!! Form::text('generic_name[]',null,['class'=>'form-control']) !!}
            <div class="text-danger generic_name_0"></div>
        </td>
        <td>
            {!! Form::select('manufacturer_id[]',$manufacturers,null,['class'=>'form-control','placeholder'=>'Select Manufacturers']) !!}
            <div class="text-danger manufacturer_id_0"></div>
        </td>
        <td>
            {!! Form::text('strength[]',null,['class'=>'form-control']) !!}
            <div class="text-danger strength_0"></div>
        </td>
        <td>
            {!! Form::select('unit_id[]',$units,null,['class'=>'form-control','placeholder'=>'Select Units']) !!}
            <div class="text-danger unit_id_0"></div>
        </td>
        <td>
            {!! Form::text('box_size[]',null,['class'=>'form-control']) !!}
            <div class="text-danger box_size_0"></div>
        </td>
        <td>
            @if(!$medicine)
                <button type="button" class="btn btn-xs btn-success add"><i class="fa fa-plus"></i></button>
                <button type="button" class="btn btn-xs btn-danger d-none remove"><i class="fa fa-minus"></i></button>
            @endif
        </td>
    </tr>
    </tbody>
</table>