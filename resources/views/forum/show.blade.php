@extends('app')
@section('content')
    @include('editor::head')
    <div class="jumbotron">
        <div class="container">
            <div class="media">
                <div class="media-left">
                    <a href="#">
                        <img class="media-object img-circle" alt="64x64" src="{{$discussion->user->avatar}}" style="height:50px;
  width:50px;">
                    </a>
                </div>
                <h4 class="media-heading">{{$discussion->title}}
                    @if(Auth::check() && Auth::user()->id==$discussion->user_id)
                    <a class="btn btn-lg btn-primary pull-right" href="/discussions/{{$discussion->id}}/edit" role="button">修改帖子 »</a></h4>
                    @endif
                {{$discussion->user->name}}
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-md-9" role="main">
            <div class="blog-post">
                {!! $html !!}
            </div>
            <hr>
            <h3>帖子评论</h3>
            @foreach($discussion->comments as $comment)
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object img-circle" alt="64x64" src="{{$comment->user->avatar}}" style="height:50px;
  width:50px;">
                        </a>
                    </div>
                    <h4 class="media-heading">{{$comment->user->name}}</h4>
                    {{$comment->body}}
                </div>
            @endforeach

            <hr>
            @if(Auth::check())
            {!! Form::open(['url'=>'/comment' ])  !!}
            {!! Form::hidden('discussion_id',$discussion->id) !!}
            <div class="form-group">
                <div class="editor">
                {!! Form::textarea('body',null,['class'=>'form-control','id'=>'myEditor']) !!}
                </div>
            </div>
            <div>
                {!! Form::submit('发表评论',['class'=>'btn btn-success pull-right']) !!}
            </div>
            {!! Form::close() !!}
                @else
                <a href="/user/login" class="btn btn-block btn-success">登录参与评论</a>
             @endif
        </div>
    </div>
@stop