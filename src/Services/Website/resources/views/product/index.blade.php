@extends('website::layouts.main')

@section('content')

    <div class="container">

        <div class="row m-b-10">

            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">All products</li>
                    </ol>
                </nav>
            </div>

        </div>

    </div>

    <div class="container">

        @php $number = 0; @endphp
        @foreach($products as $product)

            @if ($number % 3 == 0)
                <div class="row row-eq-height">
                    @endif

                    @php $number++; @endphp

                    <div class="col-md-4">
                        <div class="card">
                            <a href="{{ route('products.view', ['id' => $product->id]) }}">
                                <img class="card-img-top" src="{{ $product->getImageUrl() }}"
                                     alt="{{ $product->title }}">
                            </a>

                            <div class="card-body">
                                <h5 class="card-title">
                                    <a class="link" href="{{ route('products.view', ['id' => $product->id]) }}">
                                        {{ $product->title }}
                                    </a>
                                </h5>
                                <p class="card-text"> {{ \Illuminate\Support\Str::words($product->description, 20) }}</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Some text</small>
                            </div>
                        </div>
                    </div>

                    @if ($number % 3 == 0)
                </div>
            @endif

        @endforeach
    </div>

@endsection