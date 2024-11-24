<html>
    <?php Core\View::render('partials/header', ['title' => $title ?? 'Crop User Foto']); ?>

    <body id="b-crop-body">

        <div id="crop-flex">

            <div id="crop-controls">

                <form action="/Playlist/croppie" method="post" enctype="multipart/form-data">Select image to upload:
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload Image" name="submit">
                </form>

            </div>

            <div id="crop-container"></div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function () 
            {
                // 1. Initialize Croppie
                const el = document.getElementById('crop-container');
                const croppieInstance = new Croppie(el, {
                    viewport: { width: 200, height: 200, type: 'square' }, // Options: square or circle
                    boundary: { width: 750, height: 800 },
                    enableOrientation: true,
                    enableZoom: true,
                });
        
                // 2. Handle image upload
                document.getElementById('i-upload-image').addEventListener('change', function (event) {
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
            });

            // Helper function to download the cropped image
            function downloadImage(dataUrl, filename) {
                const a = document.createElement('a');
                a.href = dataUrl;
                a.download = filename;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
            };

        </script>

    </body>
    
</html>