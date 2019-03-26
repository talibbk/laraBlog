@extends('main')
<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title',"$titleTag")

@section('stylesheets')
{!! Html::style('css/styles.css')!!}
@endsection

@section('content')

    <div class="row">
    
        <div class="col-md-8 col-md-offset-2">
            <img src="{{ asset('images/'.$post->image) }}" height="400" width="800" />
            <h1>{{ $post->title }}</h1>
            <p>{!! $post->body !!}</p>
            <hr>
            <p>Posted In: {{$post->category['name']}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset2">
            <h3 class="comments-title"><span><i class="fas fa-comments"></i></span> {{ $post->comments->count() }} Comments</h3>
            @foreach($post->comments as $comment)
                <div class="comment">
                <div class="author-info">
                <img src="{{ "https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->email)))."?s=50&default=monsterid" }}" class="author-image">
                    <div class="author-name">
                        <h4>{{ $comment->name }}</h4>
                        
                        <p class="author-time">{{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                        
                    </div>
                    
                    <div class="comment-content">
                        {{ $comment->comment }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="comment-form" class="col-md-8 col-md0offset-2">
            {{ Form::open(['route'=>['comments.store',$post->id],'method'=>'POST']) }}

            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('name',"Name:") }}
                    {{ Form::text('name',null,['class'=>'form-control']) }}
                </div>

                <div class="col-md-6">
                    {{ Form::label('email','Email:') }}
                    {{ Form::text('email',null,['class'=>'form-control']) }}
                </div>

                <div class="col-md-12">
                    {{ Form::label('comment',"Comment:") }}
                    {{ Form::textarea('comment',null,['class'=>'form-control','rows'=>'5']) }}

                    {{ Form::submit('Add Comment',['class'=>'btn btn-success btn-block mt-2']) }}
                </div>
            </div>
        </div>
    </div>

@endsection