<table class="table-custom purchase_table">
    <thead>
    <tr>
        <th>Medicine<dfn class="text-danger">*</dfn></th>
        <th>Batch <dfn class="text-danger">*</dfn></th>
        <th>Expire Date <dfn class="text-danger">*</dfn></th>
        <th>Unit <dfn class="text-danger">*</dfn></th>
        <th>Qty <dfn class="text-danger">*</dfn></th>
        <th>Manufacturer Price <dfn class="text-danger">*</dfn></th>
        <th>Retail Price <dfn class="text-danger">*</dfn></th>
        <th>Total <dfn class="text-danger">*</dfn></th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
            {!! Form::select('medicine_id[]',[],null,['class'=>'form-control medicine_id','placeholder'=>'Select Medicine']) !!}
            <div class="text-danger medicine_id_0"></div>
        </td>
        <td>
            {!! Form::text('batch[]',null,['class'=>'form-control']) !!}
            <div class="text-danger batch_0"></div>
        </td>
        <td>
            {!! Form::date('expire_date[]',null,['class'=>'form-control']) !!}
            <div class="text-danger expire_date_0"></div>
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
            {!! Form::number('manufacture_price[]',null,['step' => '0.1','class'=>'form-control manufacture_price','placeholder'=>'0.01']) !!}
            <div class="text-danger manufacture_price_0"></div>
        </td>
        <td>
            {!! Form::number('retail_price[]',null,['step' => '0.1','class'=>'form-control retail_price','placeholder'=>'0.01']) !!}
            <div class="text-danger retail_price_0"></div>
        </td>
        <td>
            {!! Form::number('total[]',null,['step' => '0.1','class'=>'form-control total']) !!}
            <div class="text-danger total_0"></div>
        </td>
        <td>
            <button type="button" class="btn btn-xs btn-success add"><i class="fa fa-plus"></i></button>
            <button type="button" class="btn btn-xs btn-danger d-none remove"><i class="fa fa-minus"></i></button>
        </td>
    </tr>
    </tbody>
</table>