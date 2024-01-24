let email = document.getElementById('id_input_email');
let pass = document.getElementById('id_input_pass');
let pass2 = document.getElementById('id_input_pass2');
let register = document.getElementById('id_register');

let emailValidState = false;
let passValidState = false;
let pass2ValidState = false;


email.addEventListener("change", emailValidate);
pass.addEventListener("change", passValidate);
pass2.addEventListener("change", pass2Validate);
register.addEventListener("submit", checkAllStates);



function checkAllStates() {

    if (emailValidState && passValidState && pass2ValidState)
    {
        // register.action = "../controllers/checkUserInDatabase.php";

    } else {

        alert("Vyplňte prosím všechny údaje.");
        // register.action = "";
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

function pass2Validate() {

    if(this.value !== pass.value)
    {
        alert("Zadejte stejné heslo, pro potvrzení.");
        this.classList.add('input--error');
        pass2ValidState = false;

    } else {

        this.classList.remove('input--error');
        pass2ValidState = true;
    }
}