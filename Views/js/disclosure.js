var userButtonState = true;

// po kliknuti tl.uzivatele rozevre nav-left-upper
const userButton = document.getElementById("b-user-btn");
userButton.addEventListener("click", navLeftUpperUnroll);


function navLeftUpperUnroll()
{
    let elem = document.getElementsByClassName("nav-left-upper")[0];
    if(userButtonState){
        if(elem.classList.contains('close')){
            elem.classList.remove('close');
        }
        elem.classList.add('open');
        userButtonState = false;
    }else{
        if(!userButtonState){
            if(elem.classList.contains('open')){
                elem.classList.remove('open');
            }
        elem.classList.add('close');
        userButtonState = true;
        }
    }
}
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
