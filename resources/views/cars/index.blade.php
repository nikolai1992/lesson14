@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Cars</div>
        <div class="card-body">
            <div class="row">
                <a href="{{route('cars.create')}}" style="float: right" class="btn btn-primary">Add new</a>
            </div><br>
            <table>
                <thead>
                <tr>
                    <th>
                        Image
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Car type
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>

                </thead>
                <tbody>
                    @foreach($cars as $car)
                        <tr>
                            <td>
                                @if($car->image)
                                    <image src="{{$car->image}}" style="width: 100px">
                                @endif
                            </td>
                            <td>{{$car->name}}</td>
                            <td>{{$car->description}}</td>
                            <td>
                                @if($car->type)
                                    {{$car->type->name}}
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{route('cars.edit', $car->id)}}">Edit</a>
                                {{Form::open(['route'=>['cars.destroy', $car->id], 'method'=>'delete'])}}
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