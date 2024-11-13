var usraccModal = document.getElementsByClassName('usracc_modal')[0];
var mouseCoords = document.getElementById('mouseCoords');


usraccModal.addEventListener('mousemove', getMouseCoords);

let isMouseDown = false;

document.addEventListener('mousedown', function() {
    isMouseDown = true;
});

document.addEventListener('mouseup', function() {
    isMouseDown = false;
});


// Function to get mouse coordinates within modal content
function getMouseCoords(e) {
  if (isMouseDown){
    var x = e.clientX - usraccModal.offsetLeft;
    var y = e.clientY - usraccModal.offsetTop;
    mouseCoords.innerHTML = 'Mouse X: ' + x + ', Mouse Y: ' + y;
  }
}