@extends('app')
@section('content')
    @include('editor::head')
    <div class="container">
        <div class="row">
        <div class="col-md-10 col-md-offset-1" role="main">
            {!! Form::open(['url'=>'discussions' ])  !!}
            <div class="form-group">
                {!! Form::label('title','Title:') !!}
                {!! Form::text('title',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <div class="editor">
                {!! Form::textarea('body',null,['class'=>'form-control','id'=>'myEditor']) !!}
                </div>
            </div>
            <div>
                {!! Form::submit('发表帖子',['class'=>'btn btn-success pull-left']) !!}
            </div>
            {!! Form::close() !!}
        </div>
        </div>
    </div>
@stop