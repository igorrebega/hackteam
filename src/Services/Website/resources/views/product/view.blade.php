@extends('website::layouts.main')

@section('content')

    <div class="container">

        <div class="row m-b-10">

            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-info font-weight-bold">
                        <li class="breadcrumb-item text-light"><a class="text-light"
                                                                  href="{{ route('website.products') }}">ALL
                                PRODUCTS</a></li>
                        <li class="breadcrumb-item text-light active" aria-current="page">{{ $product->title }}</li>
                    </ol>
                </nav>
            </div>

        </div>

    </div>

    <div class="container">

        <div class="card border-0">
            <div class="card-body">
                <img class="card-img w-25 float-left" src="{{ $product->getImageUrl() }}"
                     alt="{{ $product->title }}">
                <p class="card-text text-secondary">
                    {{ $product->description }}
                </p>

                <div class="contentarea">
                    <div class="camera">
                        <video id="video">Video stream not available.</video>
                        <button id="startbutton">Take photo</button>
                    </div>
                    <canvas id="canvas">
                    </canvas>
                    <div class="output">
                        <img id="photo" alt="The screen capture will appear in this box.">
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        window.productId = 1;
    </script>

    <script src="/js/site.js" type="text/javascript"></script>

@endsection