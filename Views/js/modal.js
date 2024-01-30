
let modal = document.querySelector(".modal-overlay");
let btn_new_todo = document.getElementById("btn_new_todo");

btn_new_todo.onclick = function () {
    modal.style.display = "flex";
}

window.onclick = function (event) {
    
    if (event.target == modal) {
        modal.style.display = "none";
    }
}