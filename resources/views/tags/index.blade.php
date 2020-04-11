@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">List of tags</div>
        <div class="card-body">
            <div class="row">
                <a href="{{route('tags.create')}}" style="float: right" class="btn btn-primary">Add new</a>
            </div><br>
                <table>
                    <thead>
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->name}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('tags.edit', $tag->id)}}">Edit</a>
                                {{Form::open(['route'=>['tags.destroy', $tag->id], 'method'=>'delete'])}}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                {{Form::close()}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection