@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="text-center">
                    <div id="validation-errors"></div>
                    <img src="{{Auth::user()->avatar}}" width="120" height="120" class="img-circle" id="user-avatar" alt="">
                    <form action="{{ url('/user/avatar') }}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <input type="file" name="avatar">
                        <br>
                        <button class="btn btn-lg btn-info">上传头像</button>
                    </form>
                    <div class="span5">
                        <div id="output" style="display:none">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop