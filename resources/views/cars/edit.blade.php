@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Edit car</div>
        <div class="card-body">
            {!! Form::model($model,['url'=>route('cars.update', $model->id),'method'=>'PATCH', 'files'=>'true']) !!}
                   <div class="row">
                       <label>Car name</label>
                       <input name="name" class="form-control" value="{{$model->name}}">
                   </div>
                   <div class="row">
                       <label>Description</label>
                       <textarea class="form-control" name="description">{{$model->description}}</textarea>
                   </div>
                    <div class="row">
                        <label>Image</label>
                        {{ Form::file('image', null,['class'=>'form-control upload_image']) }}
                        <div class="col-md-4">
                            <img id="holder" style="height:100px;" src="{{$model->image}}">
                        </div>
                        <br>
                    </div>
                    <div class="row">
                        <label>Car type</label>
                        <select class="form-control" name="type_id">
                            <option value=""></option>
                            @foreach($types as $type)

                                @if($model->type)
                                    <option value="{{$type->id}}" {{$type->id==$model->type->id ? 'selected' : ''}}>{{$type->name}}</option>
                                @else
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                   <input type="submit" value="Save" class="btn btn-success">
                   <div class="row"></div>
            {{Form::close()}}
        </div>
    </div>
@endsection
@section('script')
    <script>
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    console.log(e.target.result)
                    $('#holder').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        //previewing of images before uploading
        $("input[name='image']").change(function() {
            console.log('change');
            readURL(this);
        });
    </script>
@endsection
