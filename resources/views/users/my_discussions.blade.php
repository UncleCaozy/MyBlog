@extends('app')
@section('content')
    <div class="container">
        <div class="col-md-9" role="main">
            @foreach($discussions as $discussion)

                <div class="media">

                    <div class="media-left">

                        <a href="#">
                            <img class="media-object img-circle"  alt="64x64" src="{{$discussion->user->avatar}}" style="height:50px;
  width:50px;">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">
                            <h4 class="media-heading"><a href="/discussions/{{$discussion->id}}">{{$discussion->title}}</a></h4>
                            <div class="dropdown pull-right">
                                <form action="{{ url('/discussions/'.$discussion->id) }}" method="POST" style="display: inline;">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger">删除</button>
                                </form>
                                <button type="button" class="btn btn-primary pull-right" data-toggle="button" aria-pressed="false" a href="/discussions/create" autocomplete="off">
                                    发布新帖
                                </button>
                                <button type="button" class="btn btn-primary pull-right" data-toggle="button" aria-pressed="false" a href="/discussions/{{$discussion->id}}/edit" autocomplete="off">
                                    修改帖子
                                </button>
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