@extends('main')

@section('title','Homepage')

@section('content')
    <div class="row pt-3">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="display-4">Welcome to my Blog!</h1>
                <p class="lead">Thankyou so much for visiting.This is my test website built with Laravel.Feel free to got through my latest posts!</p>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Posts</a></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">

            @foreach($posts as $post)  

                <div class="post">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ substr(strip_tags($post->body),0,300) }}{{strlen(strip_tags($post->body)) > 300 ? "...":""}}</p>
                    <a href="{{url('blog/'.$post->slug)}}" class="btn btn-primary">Read More</a>
                </div>

                <hr>
            
            @endforeach

        </div>

        <div class="col-md-3 col-md-offset-1">
        
        <h2>SideBar</h2>
        </div>
    </div>
@endsection