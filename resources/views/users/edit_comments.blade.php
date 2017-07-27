@extends('app')
@section('content')
    @include('editor::head')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" role="main">
                {!! Form::model($comment,['method'=>'PATCH','url'=>'comment/'.$comment->id ])  !!}
                <div class="form-group">
                    <div class="editor">
                        {!! Form::textarea('body',null,['class'=>'form-control','id'=>'myEditor']) !!}
                    </div>
                </div>
                <div>
                    {!! Form::submit('更新评论',['class'=>'btn btn-success pull-right']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop