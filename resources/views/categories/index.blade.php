@extends('main')

@section('title','All Categories')

@section('content')

<div class="row">
    <div class="col-md-8">
        <h1>Categories</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <th>{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> <!-- end of col-md-8 -->

    <div class="col-md-4 mb-3 pt-4">
        <div class="card text-white">
            <div class="card-body bg-dark">
                <dl class="dl-horizontal">
                    {!! Form::open(['route'=>'categories.store','method'=>'POST']) !!}
                    <h2>New Category</h2>
                    {{Form::label('name','Name')}}
                    {{Form::text('name',null,['class'=>'form-control'])}}

                    {{Form::submit('Create New Category',['class'=>'btn btn-primary btn-block mt-3'])}}
                </dl>
            </div>
        </div>
    </div>
</div>

@endsection