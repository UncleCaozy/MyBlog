@extends('app')
@section('content')
    <div class="container">
        <div class="row">
        <div class="col-md-6 col-md-offset-3" role="main">
            @if($errors->any())
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                        <li class="list-group-item-danger">
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            @endif
            {!!Form::open(['url'=>'/user/register']) !!}
            <div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email','Email:') !!}
                {!! Form::text('email',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password','Password:') !!}
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password_confirmation','Password_confirmation:') !!}
                {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
            </div>
            {!! Form::submit('马上注册',['class'=>'btn btn-success form-control']) !!}
            {!!Form::close() !!}
        </div>
        </div>
    </div>
@stop