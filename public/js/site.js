(function () {
    // The width and height of the captured photo. We will set the
    // width to the value defined here, but the height will be
    // calculated based on the aspect ratio of the input stream.

    var width = 500; // We will scale the photo width to this
    var height = 0; // This will be computed based on the input stream

    // |streaming| indicates whether or not we're currently streaming
    // video from the camera. Obviously, we start at false.

    var streaming = false;

    // The various HTML elements we need to configure or control. These
    // will be set by the startup() function.

    var video = null;
    var canvas = null;
    var photo = null;
    var startbutton = null;

    function startup() {
        video = document.getElementById('video');
        canvas = document.getElementById('canvas');
        photo = document.getElementById('photo');
        startbutton = document.getElementById('startbutton');

        navigator.getMedia = (navigator.getUserMedia ||
            navigator.webkitGetUserMedia ||
            navigator.mozGetUserMedia ||
            navigator.msGetUserMedia);

        navigator.getMedia({
                video: true,
                audio: false
            },
            function (stream) {
                if (navigator.mozGetUserMedia) {
                    video.mozSrcObject = stream;
                } else {
                    var vendorURL = window.URL || window.webkitURL;
                    video.src = vendorURL.createObjectURL(stream);
                }
                video.play();
            },
            function (err) {
                console.log("An error occured! " + err);
            }
        );

        video.addEventListener('canplay', function (ev) {
            if (!streaming) {
                height = video.videoHeight / (video.videoWidth / width);

                // Firefox currently has a bug where the height can't be read from
                // the video, so we will make assumptions if this happens.

                if (isNaN(height)) {
                    height = width / (16 / 9);
                }

                video.setAttribute('width', width);
                video.setAttribute('height', height);
                canvas.setAttribute('width', width);
                canvas.setAttribute('height', height);
                streaming = true;
            }
        }, false);

        startbutton.addEventListener('click', function (ev) {
            takepicture();
            ev.preventDefault();
        }, false);
    }


    // Capture a photo by fetching the current contents of the video
    // and drawing it into a canvas, then converting that to a PNG
    // format data URL. By drawing it on an offscreen canvas and then
    // drawing that to the screen, we can change its size and/or apply
    // other changes before drawing it.

    function takepicture() {
        var context = canvas.getContext('2d');
        if (width && height) {
            canvas.width = width;
            canvas.height = height;
            context.drawImage(video, 0, 0, width, height);

            var data = canvas.toDataURL('image/png');

            $('.loader').show();
            $('#exampleModal').modal('hide');

            $.ajax({
                type: "POST",
                url: "/product/vote/" + window.productId,
                data: {
                    imgBase64: data,
                    imgName: "webcam.png"
                }
            }).done(function (o) {
                if (o.data.status == undefined) {
                    $('.success-message').show();
                    setTimeout(function () {
                        $('.success-message').hide();
                    }, 2000);
                    updateEmojies(o.data);
                } else {
                    $('.not-success-message').show();
                    setTimeout(function () {
                        $('.not-success-message').hide();
                    }, 2000);
                }
                $('.loader').hide();

                console.log('saved');
            }).fail(function () {
                $('.loader').hide();
            })
        }
    }

    // Set up our event listener to run the startup process
    // once loading is complete.

    function updateEmojies(data) {
        $.each(data, function (key, value) {
            $('.emo.' + key).html(value);
        })
    }

    var runned = false;

    $('.btn-rate').click(function () {
        if (!runned) {
            startup();
            runned = true;
        }
    });

})();

