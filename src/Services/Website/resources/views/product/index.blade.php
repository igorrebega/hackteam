@extends('website::layouts.main')

@section('content')

    <div class="container">

        <div class="row m-b-10">

            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-info font-weight-bold">
                        <li class="breadcrumb-item active text-light" aria-current="page">ALL PRODUCTS</li>
                    </ol>
                </nav>
            </div>

        </div>

    </div>

    <div class="container">

        @php $number = 0; @endphp
        @foreach($products as $product)

            @if ($number % 3 == 0)
                <div class="row row-eq-height product-row">
                    @endif

                    @php $number++; @endphp

                    <div class="col-md-4">
                        <div class="card border-0">
                            <a href="{{ route('website.products.view', ['id' => $product->id]) }}">
                                <img class="card-img-top" src="{{ $product->getImageUrl() }}"
                                     alt="{{ $product->title }}">
                            </a>

                            <div class="card-body">
                                <h5 class="card-title">
                                    <a class="text-info" href="{{ route('website.products.view', ['id' => $product->id]) }}">
                                        {{ $product->title }}
                                    </a>
                                </h5>
                                <p class="card-text text-secondary"> {{ \Illuminate\Support\Str::words($product->description, 20) }}</p>
                            </div>
                            <div class="card-footer border-0 bg-info">
                                <span class="text-light">Price: ${{ $product->price }}</span>
                                <a href="{{ route('website.products.view', ['id' => $product->id]) }}" class="btn btn-sm btn-outline-light">View</a>
                            </div>
                        </div>
                    </div>

                    @if ($number % 3 == 0)
                </div>
            @endif

        @endforeach
    </div>

@endsection