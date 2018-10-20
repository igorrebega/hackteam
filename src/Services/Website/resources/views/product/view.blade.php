<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato', 'Helvetica';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
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

<script>
    window.productId = 1;
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js" type="text/javascript"></script>
<script src="/js/site.js" type="text/javascript"></script>
</body>
</html>
