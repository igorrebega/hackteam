<div class="row cleafix">

    <div class="col-md-6">
        {!! Form::label('name', 'Name') !!}
        <div class="form-group">
            <div class="form-line {!! $errors->get('name') ? 'error' : '' !!}">
                {!! Form::text('name', null, ['id' => 'name','class' => 'form-control', 'placeholder' => 'Enter your name']) !!}
            </div>
            @if($errors->get('name'))
                <label class="error">
                    @foreach($errors->get('name') as $error)
                        {!! $error !!}
                    @endforeach
                </label>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        {!! Form::label('surname', 'Surname') !!}
        <div class="form-group">
            <div class="form-line {!! $errors->get('surname') ? 'error' : '' !!}">
                {!! Form::text('surname', null, ['id' => 'surname','class' => 'form-control', 'placeholder' => 'Enter your surname']) !!}
            </div>
            @if($errors->get('surname'))
                <label class="error">
                    @foreach($errors->get('surname') as $error)
                        {!! $error !!}
                    @endforeach
                </label>
            @endif
        </div>
    </div>

</div>

<div class="row clearfix">

    <div class="col-md-12">
        {!! Form::label('email', 'Email') !!}
        <div class="form-group">
            <div class="form-line {!! $errors->get('email') ? 'error' : '' !!}">
                {!! Form::text('email', null, ['id' => 'email','class' => 'form-control', 'placeholder' => 'Enter your email']) !!}
            </div>
            @if($errors->get('email'))
                <label class="error">
                    @foreach($errors->get('email') as $error)
                        {!! $error !!}
                    @endforeach
                </label>
            @endif
        </div>
    </div>

</div>

<div class="row clearfix">

    <div class="col-md-6">
        {!! Form::label('password', 'Password') !!}
        <div class="form-group">
            <div class="form-line {!! $errors->get('password') ? 'error' : '' !!}">
                {!! Form::password('password', ['id' => 'password','class' => 'form-control', 'placeholder' => 'Enter your password']) !!}
            </div>
            @if($errors->get('password'))
                <label class="error">
                    @foreach($errors->get('password') as $error)
                        {!! $error !!}
                    @endforeach
                </label>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        {!! Form::label('password_confirmation', 'Repeat password') !!}
        <div class="form-group">
            <div class="form-line {!! $errors->get('password_confirmation') ? 'error' : '' !!}">
                {!! Form::password('password_confirmation', ['id' => 'password_confirmation','class' => 'form-control', 'placeholder' => 'Enter your password again']) !!}
            </div>
            @if($errors->get('password_confirmation'))
                <label class="error">
                    @foreach($errors->get('password_confirmation') as $error)
                        {!! $error !!}
                    @endforeach
                </label>
            @endif
        </div>
    </div>

</div>

{!! Form::submit($item->exists ? 'UPDATE' : 'CREATE', ['class' => 'btn btn-primary m-t-15 waves-effect']) !!}
