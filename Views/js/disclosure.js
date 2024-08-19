

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

// funce je def.jednout zde v js, a jednou na serveru v php
function getInterpretersByGenre(id)
{
    $(document).ready(
        $.ajax({
            url:
                "App/Models/moje_disclosure.php?genre=id",
            type: "GET",
            success: function(response) {
                // Zpracování vrácených dat
                //var data = JSON.parse(response);
                document.write(response);
                //alert("Data: " + data);
                //document.write(data);
                
            }
        })
    )
}


// $.post("App/Models/moje_disclosure.php",
//     {
//         genre: id,
//     },
//     function (data, status) {
//         document.write("Data: " + data + "<br><br>Status: " + status)
//         // alert("Data: " + data + "\nStatus: " + status);
//     }
// )