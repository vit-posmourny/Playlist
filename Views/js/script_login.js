let email = document.getElementById('id_input_email');
let pass = document.getElementById('id_input_pass');
let login = document.getElementById('id_login');

let emailValidState = false;
let passValidState = false;


email.addEventListener("change", emailValidate);
pass.addEventListener("change", passValidate);
login.addEventListener("submit", checkAllStates);



function checkAllStates() {
    
    if (emailValidState && passValidState)
    {
        // login.action = "../controllers/checkUserInDatabase.php";

    } else {
        
        // login.action = "";
    }
    
}
function emailValidate()
{
    if (!(this.value.includes('@') && this.value.includes('.')))
    {
        this.classList.add('input--error');
        alert("Emailová adresa musí obsahovat @ a \".\".");
        emailValidState = false;

    } else
    {
        this.classList.remove('input--error');
        emailValidState = true;
    }

}

function passValidate()
{
    if (this.value.length < 8) {
        alert("Heslo musí být alespoň 8 znaků dlouhé.");
        this.classList.add('input--error');
        login.action = "";
        passValidState = false;
        
    } else {

        this.classList.remove('input--error');
        passValidState = true;
    }

}