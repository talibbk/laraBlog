@extends('main')

@section('title','Create New Post')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=oj9yqlii3lmbmitp3gj9ye99irwosebf3hhhon8cafx6suri"></script>
<script>
    tinymce.init({
        selector:'textarea',
        // skin:'dark',
        plugins:'link code codesample',
        menubar:false,
        toolbar: 'undo redo | styleselect | alignleft aligncenter alignright | bold italic | link image | code codesample',
    });
</script>
@endsection

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Post</h1>
            <hr>
            {!! Form::open(array('route' => 'posts.store','data-parsley-validate'=>'','files'=>true)) !!}
                {{ Form::label('title','Title:') }}
                {{ Form::text('title',null,array('class'=>'form-control','required'=>'','maxlength'=>'255')) }}

                {{ Form::label('slug','Slug')}}
                {{ Form::text('slug',null,array('class'=>'form-control','required' =>'','minlength'=>'5','maxlength'=>'255')) }}

                {{ Form::label('category','Category:') }}
                <select class="form-control" name="category_id">
                    @foreach($categories as $category)
                        <option value='{{ $category->id }}'>{{ $category->name }}</option>
                    @endforeach
                </select>

                {{ Form::label('tags','Tags:') }}
                <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                    @foreach($tags as $tag)
                        <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
                    @endforeach
                </select>
                <p></p>
                {{ Form::label('featured_image','Upload Featured Image:',['class'=>'form-spacing-top']) }}
                {{ Form::file('featured_image') }}
                <p></p>
                {{ Form::label('body',"Post Body:") }}
                {{ Form::textarea('body',null,array('class'=>'form-control')) }}

                {{ Form::submit('Create Post',array('class'=>'btn btn-success bt-lg btn-block','style'=>'margin-top:20px')) }}
            
            {!! Form::close() !!}
        </div>
    </div>
    @endsection

    @section('scripts')

    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}
    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>

    @endsection