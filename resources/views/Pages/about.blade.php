@extends('main')

@section('title','About')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>About Blog</h1>
        <hr>
        <p>This is a simple blog app created for learning purpose using Laravel Framework 5.7.28. 
        <br/>The blog supports following features:</p>
        <ul>
            <li>Tagging</li>
            <li> Categorization</li>
            <li> Password reset/Contact email using MailTrap</li>
            <li>Image Uploades</li>
            <li>Comments</li>
            <li>WYSIWYG editor for making posts</li>
            <li>User Authentication</li>
            <li>Pagination after given number of posts</li>
            <li>Simple design using basic bootstrap</li>
        </ul>

    <h2>Special Thanks</h2>
    <hr>
    Special Thanks to Alex Curtis for his super awesome youtube tutorial that helped me create this blog app!<br/>
    You can find his tutorial for Laravel Framework 5.2 <a href="https://www.youtube.com/playlist?list=PLwAKR305CRO-Q90J---jXVzbOd4CDRbVx"><b>here</b></a>
    </div>
</div>

@endsection