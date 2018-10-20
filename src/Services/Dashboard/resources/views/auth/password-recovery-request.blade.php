@extends('dashboard::layouts.unauthorized', ['pageClass' => 'fp-page'])

@section('content')

    <div class="fp-box">
        <div class="logo">
            <a href="javascript:void(0);">Hack<b>Team</b></a>
            <small>Password recovery</small>
        </div>
        <div class="card">
            <div class="body">
                @if(session()->has('recovery-letter-sent'))

                    <div class="msg" style="margin: 20px 0;">
                        {{ session()->get('recovery-letter-sent') }}
                    </div>

                @else
                    {!! Form::open(['route' => 'auth.accept-password-recovery-request', 'id' => 'forgot_password', 'method' => 'post']) !!}

                    <div class="msg">
                        Enter your email address that you used to login. We'll send you an email with a
                        link to reset your password.
                    </div>
                    <div class="input-group">

                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
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

                    {!! Form::submit('RESET MY PASSWORD', ['class' => 'btn btn-block btn-lg bg-pink waves-effect']) !!}

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="{{route('auth.login')}}">Sign In!</a>
                    </div>
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </div>

@stop