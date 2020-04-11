@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Create article</div>
        <div class="card-body">
            {!! Form::open(['url'=>route('articles.store'),'method'=>'POST', 'files'=>true]) !!}
            <div class="row">
                <label>Name</label>
                <input name="name" class="form-control" value="">
            </div>
            <div class="row">
                <label>Short description</label>
                <textarea class="form-control" name="short_description"></textarea>
            </div>
            <div class="row">
                <label>Description</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
            <div class="row">
                <label>Image</label>
                {{ Form::file('image', ['class'=>'form-control upload_image'],['class'=>'form-control upload_image']) }}
                <div class="col-md-4">
                    <img id="holder" style="width:100px;">
                </div>
                <br>
            </div>
            <div class="row">
                <label for="tags_id">Tags</label>
                {{ Form::select('tags_id[]', $tags, null, ['multiple' => 'multiple', 'class'=>'form-control tags']) }}
            </div>
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
