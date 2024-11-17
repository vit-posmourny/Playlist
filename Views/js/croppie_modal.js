var imgBtn = document.getElementById('open');

imgBtn.addEventListener('click', openDialogInNewWindow);

function openDialogInNewWindow() {
    // Define the content for the new window
    const dialogWindow = window.open("/Playlist/croppie", "DialogWindow", "width=500,height=600");
        
}