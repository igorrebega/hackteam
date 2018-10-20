<div class="row cleafix">

    <div class="col-md-6">
        {!! Form::label('title', 'Title') !!}
        <div class="form-group">
            <div class="form-line {!! $errors->get('title') ? 'error' : '' !!}">
                {!! Form::text('title', null, ['id' => 'title','class' => 'form-control', 'placeholder' => 'Enter the title']) !!}
            </div>
            @if($errors->get('title'))
                <label class="error">
                    @foreach($errors->get('title') as $error)
                        {!! $error !!}
                    @endforeach
                </label>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        {!! Form::label('price', 'Price') !!}
        <div class="form-group">
            <div class="form-line {!! $errors->get('price') ? 'error' : '' !!}">
                {!! Form::number('price', null, ['id' => 'price','class' => 'form-control', 'step' => '0.01', 'placeholder' => 'Enter the price']) !!}
            </div>
            @if($errors->get('price'))
                <label class="error">
                    @foreach($errors->get('price') as $error)
                        {!! $error !!}
                    @endforeach
                </label>
            @endif
        </div>
    </div>

</div>

{!! Form::label('description', 'Description') !!}
<div class="form-group">
    <div class="form-line {!! $errors->get('description') ? 'error' : '' !!}">
        {!! Form::textarea('description', null, ['id' => 'description','class' => 'form-control', 'placeholder' => 'Enter the description']) !!}
    </div>
    @if($errors->get('description'))
        <label class="error">
            @foreach($errors->get('description') as $error)
                {!! $error !!}
            @endforeach
        </label>
    @endif
</div>

{!! Form::submit($item->exists ? 'UPDATE' : 'CREATE', ['class' => 'btn btn-primary m-t-15 waves-effect']) !!}
