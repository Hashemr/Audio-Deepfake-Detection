<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading</title>
    <link rel="stylesheet" href="./css/loading.css">
    <link rel="icon" type="image/x-icon" href="./images/logo graduation.jpg"> <!-- Corrected the type attribute -->
</head>

<body>
    <div style="display:none" id="animationWindow"></div>

    <!-- Include Bodymovin library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.4/lottie.min.js"></script>

    <script>
        var select = function(s) {
                return document.querySelector(s);
            },
            selectAll = function(s) {
                return document.querySelectorAll(s);
            },
            animationWindow = select('#animationWindow'),
            animData = {
                wrapper: animationWindow,
                animType: 'svg',
                loop: true,
                prerender: true,
                autoplay: true,
                path: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/35984/play_fill_loader.json',
                rendererSettings: {
                    //context: canvasContext, // the canvas context
                    //scaleMode: 'noScale',
                    //clearCanvas: false,
                    //progressiveLoad: false, // Boolean, only svg renderer, loads dom elements when needed. Might speed up initialization for large number of elements.
                    //hideOnTransparent: true //Boolean, only svg renderer, hides elements when opacity reaches 0 (defaults to true)
                }
            },
            anim;

        anim = bodymovin.loadAnimation(animData);

        anim.addEventListener('DOMLoaded', onDOMLoaded);
        anim.setSpeed(1);

        function onDOMLoaded(e) {
            anim.addEventListener('complete', function() {});}
    </script>
</body>

</html>


