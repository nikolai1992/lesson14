@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Create car</div>
        <div class="card-body">

            {!! Form::open(['url'=>route('cars.store'),'method'=>'POST', 'files'=>true]) !!}
                <div class="row">
                    <label>Car name</label>
                    <input name="name" class="form-control" value="">
                </div>
                <div class="row">
                    <label>Description</label>
                    <textarea class="form-control" name="description"></textarea>
                </div>
                <div class="row">
                    <label>Image</label>
                    {{ Form::file('image', null,['class'=>'form-control upload_image']) }}
                    <div class="col-md-4">
                        <img id="holder" style="width:100px;">
                    </div>
                    <br>
                </div>
                <div class="row">
                    <label>Car type</label>
                    <select class="form-control" name="type_id">
                        <option value=""></option>
                        @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
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
