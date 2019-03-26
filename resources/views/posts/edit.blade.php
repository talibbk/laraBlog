@extends('main')

@section('title','Edit Blog Post')

@section('stylesheets')
    
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


{!! Form::model($post, ['route' => ['posts.update', $post->id],'method'=>'PUT','files' => true]) !!}
  <div class="form-row">
    <div class="col-md-8 mb-3">
        {{ Form::label('title', 'Title:',['class'=>'form-spacing-top']) }}
        {{ Form::text('title', null, ["class" => 'form-control']) }}
        
        {{ Form::label('slug','Slug:',['class'=>'form-spacing-top']) }}
        {{ Form::text('slug',null,['class'=>'form-control']) }}
        
        {{ Form::label('category_id',"Category:",['class'=>'form-spacing-top']) }}
        {{ Form::select('category_id',$categories,null,['class'=>'form-control'])}}

        {{ Form::label('tags','Tags:',['class'=>'form-spacing-top']) }}
        {{ Form::select('tags[]',$tags,null,['class'=>'form-control select2-multi','multiple'=>'multiple']) }}
        <p></p>
        {{ Form::label('featured_image','Update Featured Image:',['class'=>'form-spacing-top']) }}
        {{ Form::file('featured_image') }}
        <p></p>
        {{ Form::label('body', 'Your blog:',['class'=>'form-spacing-top']) }}
        {{ Form::textarea('body', null, ["class" => 'form-control']) }}
    </div>
    <div class="col-md-4 mb-3 pt-4">
        <div class="card text-white">
            <div class="card-body bg-dark">
                <dl class="dl-horizontal">
                    <dt>Created at:</dt>
                    <dd>{{$post->created_at->toFormattedDateString()}}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{$post->updated_at->diffForHumans()}}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                    {!! Html::linkRoute('posts.show','Cancel',array($post->id),array('class'=>'btn btn-danger btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                    {{ Form::submit('Save Changes',['class'=>'btn btn-success btn-block']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>

@endsection

@section('scripts')

    {!! Html::script('js/select2.min.js') !!}
    <script type="text/javascript">
        $('.select2-multi').select2().val({!! $post->tags()->allRelatedIds() !!}).trigger('change');
    </script>

@endsection