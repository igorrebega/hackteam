@extends('dashboard::layouts.unauthorized', ['pageClass' => 'login-page'])

@section('content')

    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Hack<b>Team</b></a>
            <small>Login</small>
        </div>
        <div class="card">
            <div class="body">
                {!! Form::model($item, ['route' => 'auth.authenticate', 'id' => 'sign_in', 'method' => 'post']) !!}
                <div class="msg">
                    @if(session()->has('password-reset-successfully'))
                        {{ session()->get('password-reset-successfully') }}
                    @else
                        Sign in to start your session
                    @endif
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>

                    <div class="form-line {!! $errors->get('email') ? 'error' : '' !!}">
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required', 'autofocus']) !!}
                    </div>
                    @if($errors->get('email'))
                        <label class="error">
                            @foreach($errors->get('email') as $error)
                                {!! $error !!}
                            @endforeach
                        </label>
                    @endif
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                    <div class="form-line {!! $errors->get('password') ? 'error' : '' !!}">
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required']) !!}
                    </div>
                    @if($errors->get('password'))
                        <label class="error">
                            @foreach($errors->get('password') as $error)
                                {!! $error !!}
                            @endforeach
                        </label>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xs-8 p-t-5">
                        {!! Form::checkbox('remember', 'remember', false, ['id' => 'remember', 'class' => 'filled-in chk-col-pink']) !!}
                        {!! Form::label('remember', 'Remember Me') !!}
                    </div>
                    <div class="col-xs-4">
                        {!! Form::submit('SIGN IN', ['class' => 'btn btn-block bg-pink waves-effect']) !!}
                    </div>
                </div>
                <div class="row m-t-15 m-b--20">
                    <div class="col-xs-12 align-center">
                        <a href="{{route('auth.password-recovery-request')}}">Forgot Password?</a>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@stop