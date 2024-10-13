

// Shromazdim kolekci vsech Summary rozeviraciho seznamu
const buttons = document.getElementsByClassName("nav-left-bottom-summary");

// kazdemu jedenomu priradim EventListener
for (const button of buttons) {
    button.addEventListener("click", getGenreSummaryId);
}


// kdyz kliknu na Summary v L.panelu zde zpracuju udalost
function getGenreSummaryId() {
    let id = this.id;
    // potreba osetrit, ze jenom pro <summary> co je potomek <details>, ktery
    // nema attr.[open], nebo ktery je proste close, se zavola getInterpreterByGenre()
}
