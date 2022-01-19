@extends('layout')
@section('title', $category ? 'Update' : 'Create' .' Category')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Create Category
                    </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    {!! Form::model($category, ['url' => $category ? 'category/'.$category->id.'/update' : 'category/store', 'method' => $category ? 'PUT' : 'POST']) !!}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Category Name</label>
                            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Category Name']) !!}
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
                            <a href="{{url('category/list')}}" class="btn btn-danger"><i class=""></i> Cancel</a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection