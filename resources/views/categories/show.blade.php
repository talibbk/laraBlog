@extends('main')

@section('title',"$category->name Category")

@section('content')

    <div class="row">
        <div class="col-md-8 mt-2 mb-2">    
             <h1>{{ $category->name }}  <small> {{ $category->posts()->count() }} Posts</small> </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Categories</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($category->posts as $post)
                        <tr>
                            <th>{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>
                                <span class="badge badge-dark">{{ $category->name }}</span>
                            <td><a href="{{route('posts.show',$post->id)}}" class="btn btn-info btn-sm">View</a></td>
                            </td>
                        </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection