@extends('app')
@section('content')
    @include('editor::head')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" role="main">
                {!! Form::model($discussion,['method'=>'PATCH','url'=>'discussions/'.$discussion->id ])  !!}
                <div class="form-group">
                    {!! Form::label('title','Title:') !!}
                    {!! Form::text('title',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    <div class="editor">
                    {!! Form::label('body','Body:') !!}
                    {!! Form::textarea('body',null,['class'=>'form-control','id'=>'myEditor']) !!}
                    </div>
                </div>
                <div>
                    {!! Form::submit('更新帖子',['class'=>'btn btn-success pull-right']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop