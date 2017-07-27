@extends('app')
@section('content')
    {{--<div class="jumbotron">--}}
        {{--<div class="container">--}}
            {{--<h3>欢迎来到社区--}}
                {{--@if(\Auth::check())--}}
                    {{--<a class="btn btn-lg btn-primary pull-right" href="/discussions/create" role="button">发布新帖 »</a>--}}
                {{--@else--}}
                    {{--<a class="btn btn-lg btn-primary pull-right" href="/user/login" role="button">登录发布新帖 »</a>--}}
                {{--@endif--}}
            {{--</h3>--}}

        {{--</div>--}}
    {{--</div>--}}
    <div class="container">
        <div class="col-md-9" role="main">
            @foreach($comments as $comment)
                <div class="media">
                    <div class="dropdown pull-right">
                        <button type="button" class="btn btn-primary pull-right" data-toggle="dropdown" aria-pressed="false" autocomplete="off">
                            管理评论
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <li><a href="/discussions/{{$comment->discussion_id}}"> <i class="fa fa-mail-reply-all"></i> 查看原贴</a></li>
                            {{--<li><a href="/comment/{{$comment->id}}/edit"> <i class="fa fa-pencil"></i> 修改评论</a></li>--}}
                        </ul>
                        <form action="{{ url('/comment/'.$comment->id) }}" method="POST" style="display: inline;">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">删除</button>
                        </form>
                    </div>
                    <span class="label label-default">评论内容</span><br>
                    {{$comment->body}}
                </div>

                <hr>
            @endforeach

        </div>
    </div>
@stop