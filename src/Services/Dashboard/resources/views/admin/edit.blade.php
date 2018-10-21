@extends('dashboard::layouts.app')

@section('content')
    <div class="container-fluid">

        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            CREATE NEW ADMIN
                        </h2>
                    </div>
                    <div class="body">
                        {!! Form::model($item, ['url' => route('admins.update', ['id' => $item->id]), 'method' => 'put']) !!}

                        @include('dashboard::admin._form')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Vertical Layout -->

    </div>
@stop