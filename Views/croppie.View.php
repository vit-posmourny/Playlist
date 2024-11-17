<html>
    <head>
        <!-- Croppie CSS and JS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.js"></script>
    </head>
    <body>
        <div id="croppie-flex">
            <div id="controls">
                <input type="file" id="upload-image" accept="image/*">
                <button id="crop-result" class="button_main">Crop & Download</button>
            </div>
            <div id="croppie-container" style="width: 300; height: 300;"></div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
            // 1. Initialize Croppie
            const el = document.getElementById('croppie-container');
            const croppieInstance = new Croppie(el, {
                viewport: { width: 300, height: 300, type: 'square' }, // Options: square or circle
                boundary: { width: 550, height: 450 },
                enableOrientation: true
            });
    
            // 2. Handle image upload
            document.getElementById('upload-image').addEventListener('change', function (event) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    croppieInstance.bind({
                        url: e.target.result
                    });
                };
                reader.readAsDataURL(event.target.files[0]);
            });
    
            // 3. Handle the Crop button
            document.getElementById('crop-result').addEventListener('click', function () {
                croppieInstance.result({
                    type: 'base64',
                    size: 'viewport'
                }).then(function (croppedImage) {
                    // Download or use the cropped image
                    downloadImage(croppedImage, 'cropped-image.png');
                });
            });
            // Helper function to download the cropped image
            function downloadImage(dataUrl, filename) {
                const a = document.createElement('a');
                a.href = dataUrl;
                a.download = filename;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
            }
        });
        </script>
    </body>
</html>