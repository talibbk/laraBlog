@extends('main')

@section('title',"$tag->name Tag")

@section('content')

    <div class="row">
        <div class="col-md-8 mt-2 mb-2">    
             <h1>{{ $tag->name }} Tag <small> {{ $tag->posts()->count() }} Posts</small> </h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('tags.edit',$tag->id) }}" class="btn btn-primary pull-right btn-block mt-3">Edit</a>
        </div>
        <div class="col-md-2">
            {{ Form::open(['route'=>['tags.destroy',$tag->id],'method'=>'DELETE'])}}
                {{ Form::submit('Delete',['class'=>'btn btn-danger btn-block mt-3']) }}
            {{ Form::close() }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Tags</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($tag->posts as $post)
                        <tr>
                            <th>{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>@foreach($post->tags as $tag)
                                <span class="badge badge-dark">{{ $tag->name }}</span>
                                @endforeach
                                <td><a href="{{route('posts.show',$post->id)}}" class="btn btn-info btn-sm">View</a></td>
                            </td>
                        </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection