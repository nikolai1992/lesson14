@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Create a new car type</div>
        <div class="card-body">
            {!! Form::open(['url'=>route('car_types.store'),'method'=>'POST']) !!}
            <div class="row">
                <label>Name</label>
                <input name="name" class="form-control" value="">
            </div><br>
            <div class="row">
                <label>Car</label>
                <select class="form-control" name="car_id">
                    <option value=""></option>
                    @foreach($cars as $car)
                        <option value="{{$car->id}}">{{$car->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Save" class="btn btn-success">
            </div>
            {{Form::close()}}
        </div>
    </div>
@endsection