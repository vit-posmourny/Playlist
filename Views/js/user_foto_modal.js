var fotoBtn = document.getElementById('b-user-foto');
var closeBtn = document.getElementById('close-croppie');
const cropModal = document.getElementById('d-crop-modal');

closeBtn.addEventListener('click', function() {
    cropModal.style.display = 'none';

});

fotoBtn.addEventListener('click', function() {
    cropModal.show();
    cropModal.style.display = 'grid';

    const el = document.getElementById('croppie-container');
        const croppieInstance = new Croppie(el, {
            viewport: { width: 200, height: 200, type: 'square' }, // Options: square or circle
            boundary: { width: 400, height: 400 },
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
})

