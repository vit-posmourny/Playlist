// Shromazdim kolekci vsech Summary rozeviraciho seznamu
const buttons = document.getElementsByClassName("nav-left-bottom-summary");

// kazdemu jedenomu priradim EventListener
for (const button of buttons) {
    button.addEventListener("click", getGenreSummaryId);
}


// kdyz kliknu na Summary v L.panelu zde zpracuju udalost
function getGenreSummaryId() {
    let id = this.id;
    alert('id: '+id)
    // potreba osetrit, ze jenom pro <summary> co je potomek <details>, ktery
    // nema attr.[open], nebo ktery je proste close, se zavola getInterpreterByGenre()
    getInterpretersByGenre(id);
}



// function getInterpreterByGenre(id) {
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "App/Models/ajax/getInterpretersByGenre.php", true);
//     xhr.onreadystatechange = function () {
//         if (xhr.readyState == 4 && xhr.status == 200) {
//             let result = xhr.responseText;
//             // Do something with the result
//             console.log("SQL Function Result: " + result);
//         }
//     };
//     xhr.send();
// }

// funce je def.jednout zde v js, a jednou na serveru v php
function getInterpretersByGenre(id)
{
    $(document).ready(
        $.post("App/Models/ajax/getInterpretersByGenre.php",
            {
                genres: id,
                functionName: 444,
            },
            function (data, status) {
                document.write("Data: " + data + "<br><br>Status: " + status)
                    // alert("Data: " + data + "\nStatus: " + status);
            }
        )
    )
}


// Jen zkousim jestli zafunguje
$(document).ready(function(){
    $("summary").click(function(){
        $("h2").hide();
    });
});