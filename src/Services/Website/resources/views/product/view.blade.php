@extends('website::layouts.main')

@section('content')

    <div class="container">

        <div class="row m-b-10">

            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><a
                                    href="{{ route('website.products') }}">All products</a> / {{ $product->title }}</li>
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


                <div class="alert alert-success success-message"
                     role="alert"
                     style="display: none;margin-top: 15px"
                >
                    Your emotion was saved
                </div>

                <div class="alert alert-info non-success-message"
                     role="alert"
                     style="display: none;margin-top: 15px"
                >
                    Can`t recognize your emotion, maybe try one more time?
                </div>

                <div class="loader" style="display: none">
                    <div class="alert alert-info success-message"
                         role="alert"
                         style="margin-top: 15px"
                    >
                        Saving...
                    </div>
                </div>

                <table class="table table-bordered">
                    <tr>
                        <td>
                            <img src="/smile/surprise.png">
                        </td>
                        <td>
                            <img src="/smile/smile.png">
                        </td>
                        <td>
                            <img src="/smile/neutral.png">
                        </td>
                        <td>
                            <img src="/smile/sad.png">
                        </td>
                        <td>
                            <img src="/smile/angry.png">
                        </td>
                    </tr>
                    <tr>
                        <td class="emo surprised"><?= $emojies['surprised'] ?></td>
                        <td class="emo happy"><?= $emojies['happy'] ?></td>
                        <td class="emo neutral"><?= $emojies['neutral'] ?></td>
                        <td class="emo sad"><?= $emojies['sad'] ?></td>
                        <td class="emo angry"><?= $emojies['angry'] ?></td>
                    </tr>
                </table>

                <button class="btn btn-success"
                        data-toggle="modal" data-target="#exampleModal"
                >Rate
                </button>

                <div class="modal" tabindex="-1" role="dialog" id="exampleModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Rate product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="contentarea">
                                    <div class="camera">
                                        <video id="video">Video stream not available.</video>
                                    </div>
                                    <canvas id="canvas">
                                    </canvas>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="startbutton">
                                    Rate
                                </button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

    <script>
        window.productId = 1;
    </script>
@endsection