@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Car types</div>
        <div class="card-body">
            <div class="row">
                <a href="{{route('car_types.create')}}" style="float: right" class="btn btn-primary">Add new</a>
            </div><br>
            <table class="table-bordered">
                <thead>
                <tr>
                    <th>
                        Name
                    </th>
                    <th>
                        Cars
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>

                </thead>
                <tbody>
                @foreach($car_types as $car_type)
                    <tr>
                        <td>{{$car_type->name}}</td>
                        <td>
                            @if($car_type->cars)
                                @foreach($car_type->cars as $car)
                                    <p>{{$car->name}}</p>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{route('car_types.edit', $car_type->id)}}">Edit</a>
                            {{Form::open(['route'=>['car_types.destroy', $car_type->id], 'method'=>'delete'])}}
                            <button type="submit" class="btn btn-danger">Delete</button>
                            {{Form::close()}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection