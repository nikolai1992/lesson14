@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Edit article</div>
        <div class="card-body">
            {!! Form::open(['url'=>route('articles.update', $model->id),'method'=>'PUT', 'files'=>true]) !!}
                <div class="row">
                    <label>Name</label>
                    <input name="name" class="form-control" value="{{$model->name}}">
                </div>
                <div class="row">
                    <label>Short description</label>
                    <textarea class="form-control" name="short_description">{{$model->short_description}}</textarea>
                </div>
                <div class="row">
                    <label>Description</label>
                    <textarea class="form-control" name="description">{{$model->description}}</textarea>
                </div>
                <div class="row">
                    <label>Image</label>
                    {{ Form::file('image', ['class'=>'form-control upload_image'],['class'=>'form-control upload_image']) }}
                    <div class="col-md-4">
                        <img id="holder" style="height:100px;" src="{{$model->image}}">
                    </div>
                    <br>
                </div>
                <div class="row">
                    <label for="tags_id">Tags</label>
                    {{ Form::select('tags_id[]', $tags, $model->tags, ['multiple' => 'multiple', 'class'=>'form-control tags']) }}
                </div>
                <br>
                <div class="row">
                    <input type="submit" value="Save" class="btn btn-success">
                </div>
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
