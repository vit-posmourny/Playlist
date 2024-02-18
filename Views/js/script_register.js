let email = document.getElementById('id_input_email');
let pass = document.getElementById('id_input_pass');
let pass2 = document.getElementById('id_input_pass2');
let registerBtn = document.getElementById('id-btn-register');
let registerForm = document.getElementById('id_form_register');

let emailValidState = false;
let passValidState = false;
let pass2ValidState = false;


email.addEventListener("change", emailValidate);
pass.addEventListener("change", passValidate);
pass2.addEventListener("change", pass2Validate);
registerBtn.addEventListener("click", checkAllStates);



function checkAllStates()
{
    if (emailValidState && passValidState && pass2ValidState)
    {
        registerForm.setAttribute('action', "/Playlist/register");

        registerForm.submit();

    } else {

        document.getElementById('id-all-err').innerHTML = "Vyplňte prosím všechny údaje.";
    }
}



function emailValidate()
{
    if (!(this.value.includes('@') && this.value.includes('.')))
    {
        this.classList.add('input--error');
        document.getElementById('id-mail-err').innerHTML = 'Emailová adresa musí obsahovat @ a \".\".';
        emailValidState = false;
        
    } else {

        this.classList.remove('input--error');
        emailValidState = true;
        document.getElementById('id-mail-err').innerHTML = '';
    }
}



function passValidate()
{
    if (this.value.length < 1) {
        
        this.classList.add('input--error');
        document.getElementById('id-pass-err').innerHTML = "Heslo musí být alespoň 8 znaků dlouhé.";
        passValidState = false;

    } else {

        this.classList.remove('input--error');
        document.getElementById('id-pass-err').innerHTML = '';
        passValidState = true;
    }
}



function pass2Validate() {

    if(this.value !== pass.value)
    {
        this.classList.add('input--error');
        document.getElementById('id-pass2-err').innerHTML = "Zadejte stejné heslo, pro potvrzení.";
        pass2ValidState = false;

    } else {

        this.classList.remove('input--error');
        document.getElementById('id-pass2-err').innerHTML = '';
        pass2ValidState = true;
    }
}