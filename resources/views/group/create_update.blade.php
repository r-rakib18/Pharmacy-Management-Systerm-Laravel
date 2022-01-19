@extends('layout')
@section('title', $group ? 'Update' : 'Create' .' group')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Create Group
                    </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    {!! Form::model($group, ['url' => $group ? 'group/'.$group->id.'/update' : 'group/store', 'method' => $group ? 'PUT' : 'POST']) !!}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Group Name</label>
                            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Group Name']) !!}
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
                            <a href="{{url('group/list')}}" class="btn btn-danger"><i class=""></i> Cancel</a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection