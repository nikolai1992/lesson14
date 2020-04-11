@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Our news</div>
        <div class="card-body">
            <div class="row">
                <a href="{{route('articles.create')}}" style="float: right" class="btn btn-primary">Add new</a>
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
                        Short description
                    </th>
                    <th>
                        Tags
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>

                </thead>
                <tbody>
                @foreach($news as $new)
                    <tr>
                        <td>
                            @if($new->image)
                                <img src="{{$new->image}}" style="width: 200px">
                            @endif
                        </td>
                        <td>{{$new->name}}</td>
                        <td>{{$new->short_description}}</td>
                        <td>
                            @if($new->tags)
                                @foreach($new->tags as $tag)
                                    <p>{{$tag->name}}</p>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{route('articles.edit', $new->id)}}">Edit</a>
                            {{Form::open(['route'=>['articles.destroy', $new->id], 'method'=>'delete'])}}
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