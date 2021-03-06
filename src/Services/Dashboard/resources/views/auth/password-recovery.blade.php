@extends('dashboard::layouts.unauthorized', ['pageClass' => 'fp-page'])

@section('content')

    <div class="fp-box">
        <div class="logo">
            <a href="javascript:void(0);">Hack<b>Team</b></a>
            <small>Password recovery</small>
        </div>
        <div class="card">
            <div class="body">
                @if(session()->has('no-user-found'))

                    <div class="msg" style="margin: 20px 0;">
                        {{ session()->get('no-user-found') }}
                    </div>

                @elseif($validToken)

                    {!! Form::open(['url' => route('auth.accept-password-recovery', ['token' => $token]), 'id' => 'forgot_password', 'method' => 'post']) !!}

                    <div class="msg">
                        Password recovery for <strong>{{$email}}</strong>
                        Enter your new password and confirm it to make sure you enter it without mistakes.
                    </div>

                    <div class="input-group">

                        <div class="form-line {!! $errors->get('password') ? 'error' : '' !!}">
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required', 'autofocus']) !!}
                        </div>
                        @if($errors->get('password'))
                            <label class="error">
                                @foreach($errors->get('password') as $error)
                                    {!! $error !!}
                                @endforeach
                            </label>
                        @endif

                    </div>

                    <div class="input-group">

                        <div class="form-line {!! $errors->get('password_confirmation') ? 'error' : '' !!}">
                            {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Password confirm', 'required', 'autofocus']) !!}
                        </div>
                        @if($errors->get('password_confirmation'))
                            <label class="error">
                                @foreach($errors->get('password_confirmation') as $error)
                                    {!! $error !!}
                                @endforeach
                            </label>
                        @endif

                    </div>

                    {!! Form::submit('UPDATE PASSWORD', ['class' => 'btn btn-block btn-lg bg-pink waves-effect']) !!}

                    {!! Form::close() !!}

                @else

                    <div class="msg" style="margin: 20px 0;">
                        {{ $message }}
                    </div>

                @endif
            </div>
        </div>
    </div>

@stop