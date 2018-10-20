@extends('dashboard::layouts.app')

@section('content')
    <div class="container-fluid">

        <!-- Hover Rows -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Products
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                   role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="{{route('products.create')}}">Create new</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>TITLE</th>
                                <th>PRICE</th>
                                <th>CONTROL</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>
                                        <a href="{{route('products.edit', ['id' => $item->id])}}"
                                           class="btn btn-xs bg-indigo waves-effect">Edit</a>

                                        {!! Form::open(
                                            [
                                                'url' => route('products.delete', ['id' => $item->id]),
                                                'method' => 'delete',
                                                'style' => 'display:inline-block;'
                                            ]
                                        ) !!}

                                        {!! Form::button('Delete',
                                            [
                                                'class' => 'custom-dialog btn btn-xs bg-red waves-effect',
                                                'data-dialog-type' => 'delete-confirm',
                                                'data-dialog-title' => 'Are you sure?',
                                                'data-dialog-text' => 'You will not be able to rollback this deleting!',
                                                'data-dialog-confirm' => 'Yes, delete it!',
                                            ]
                                        ) !!}

                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Hover Rows -->

    </div>
@stop