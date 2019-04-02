@extends('main')

@section('title','All Tags')

@section('content')

<div class="row">
    <div class="col-md-8">
        <h1>Tags</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                <tr>
                    <th>{{$tag->id}}</th>
                    <td><a href="{{ route('tags.show',$tag->id) }}">{{$tag->name}}</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> <!-- end of col-md-8 -->

    <div class="col-md-4 mb-3 pt-4">
        <div class="card text-white">
            <div class="card-body bg-dark">
                <dl class="dl-horizontal">
                    {!! Form::open(['route'=>'tags.store','method'=>'POST']) !!}
                    <h2>New Tag</h2>
                    {{Form::label('name','Name')}}
                    {{Form::text('name',null,['class'=>'form-control'])}}

                    {{Form::submit('Create New Tag',['class'=>'btn btn-primary btn-block mt-3'])}}
                </dl>
                <ul>
            </div>
        </div>
    </div>
</div>

@endsection