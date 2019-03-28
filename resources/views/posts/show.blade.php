@extends('main')

@section('title','View Post')

@section('content')

    <div class="row">
        <div class="col-md-8">

        <img src="{{ asset('images/'.$post->image)}}" height="400" width="600" alt="" onerror="this.style.display='none'"/>

        <h1>{{ $post->title }}</h1>
        <p class="lead">{!! $post->body !!}</p>
        <hr>
        <div class="tags">
            @foreach($post->tags as $tag)
                <span class="badge badge-dark">{{ $tag->name }}</span>
            @endforeach
        </div>

        <div id="backend-comments" style="margin-top: 50px;" >
            <h3>Comments <small>{{ $post->comments()->count() }}</small></h3>
        
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th width="120px"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($post->comments as $comment)
                    <tr>
                        <td>{{ $comment->name }}</td>
                        <td>{{ $comment->email }}</td>
                        <td>{{ $comment->comment }}</td>
                        <td>
                            <a href="{{ route('comments.edit',$comment->id) }}" class="btn btn-xs btn-primary"><i class="fas fa-pencil-alt"></i></a>
                            <a href="{{ route('comments.delete',$comment->id) }}" class="btn btn-xs btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        
        </div>

    </div>

    <div class="col-md-4 pt-3">

        <div class="card">
            <div class="card-body bg-dark text-white">
                <dl class="dl-horizontal">
                    <dt>Url:</dt>
                    <dd><a href="{{ route('blog.single',$post->slug) }}">{{ route('blog.single',$post->slug) }}</a></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Category:</dt>
                    <dd>{{$post->category->name}}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{$post->created_at->toFormattedDateString()}}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{$post->updated_at->diffForHumans()}}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                    {!! Html::linkRoute('posts.edit','Edit',array($post->id),array('class'=>'btn btn-primary btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                    {!! Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE']) !!}

                    {!! Form::submit('Delete',['class'=>'btn btn-danger btn-block']) !!}
                    {!! Form::close() !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                    <br> 
                    <a href="{{ route('posts.index') }}" class="btn btn-info btn-block"> <i class="far fa-arrow-alt-circle-left"></i>  Show all Posts</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
