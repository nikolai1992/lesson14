@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Edit car type</div>
        <div class="card-body">
            {!! Form::open(['url'=>route('car_types.update', $model->id),'method'=>'patch']) !!}
                <div class="row">
                    <label>Name</label>
                    <input name="name" class="form-control" value="{{$model->name}}">
                </div>
                <input type="submit" value="Save" class="btn btn-success">
            {{Form::close()}}
        </div>
    </div>
@endsection