@extends('app')
@section('content')
    <div class="jumbotron">
        <div class="container">
        <h3>欢迎来到社区
            @if(\Auth::check())
                <a class="btn btn-lg btn-primary pull-right" href="/discussions/create" role="button">发布新帖 »</a>
                @else
            <a class="btn btn-lg btn-primary pull-right" href="/user/login" role="button">登录发布新帖 »</a>
            @endif
        </h3>

        </div>
    </div>

    <div class="container">
        <div class="col-md-9" role="main">
            @foreach($discussions as $discussion)
                <div class="panel panel-primary pull-right">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object img-circle"  alt="64x64" src="{{$discussion->user->avatar}}" style="height:40px;
  width:40px;">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">
                            <h4 class="media-heading"><a href="/discussions/{{$discussion->id}}">{{$discussion->title}}</a></h4>
                       <div class="media-conversation-meta">
                           <span class="media-conversation-replies">
                               <a href="/discussions/{{$discussion->id}}">{{count($discussion->comments)}}</a>
                               回复
                           </span>
                       </div>
                        </h4>
                        {{$discussion->user->name}}<br>
                        更新于：{{$discussion->updated_at}}
                    </div>
                </div>

            @endforeach
        </div>
    </div>

@stop