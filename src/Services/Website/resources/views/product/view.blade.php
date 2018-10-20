@extends('website::layouts.main')

@section('content')

    <div class="container">

        <div class="row m-b-10">

            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">A certain product</li>
                    </ol>
                </nav>
            </div>

        </div>

    </div>

    <div class="container">

        <div class="card">
            <img class="card-img-top" src="{{ $product->getImageUrl() }}" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">
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