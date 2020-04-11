@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Edit tag</div>
        <div class="card-body">
            {!! Form::open(['url'=>route('tags.update', $model->id),'method'=>'patch']) !!}
                <div class="row">
                    <label>Name</label>
                    <input name="name" class="form-control" value="{{$model->name}}">
                </div><br>
                <div class="row">
                    <input type="submit" value="Save" class="btn btn-success">
                </div>
            {{Form::close()}}
        </div>
    </div>
@endsection