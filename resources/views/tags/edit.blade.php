@extends('main')

@section('title',"Edit Tag")

@section('content')

    {{ Form::model($tag,['route'=>['tags.update',$tag->id],'method'=>"PUT"]) }}

        {{ Form::label('name',"Title:") }}
        {{ Form::text('name',null,['class'=>'form-control']) }}

        {{ Form::submit('Save Changes',['class'=>'btn btn-success mt-2']) }}
    {{ Form::close() }}
@endsection