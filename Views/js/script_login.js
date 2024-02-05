let email = document.getElementById('id_input_email');
let pass = document.getElementById('id_input_pass');
let loginBtn = document.getElementById('id-btn-login');


let emailValidState = false;
let passValidState = false;


email.addEventListener("change", emailValidate);
pass.addEventListener("change", passValidate);
loginBtn.addEventListener("click", checkAllStates);



function checkAllStates() {
    
    if (emailValidState && passValidState)
    {
        let form = document.getElementById('id_form_login');
        form.setAttribute('action', '/Playlist/login');
        form.submit();

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

    } else
    {
        this.classList.remove('input--error');
        emailValidState = true;
    }

}

function passValidate()
{
    if (this.value.length < 8)
    {
        document.getElementById('id-pass-err').innerHTML = "Heslo musí být alespoň 8 znaků dlouhé.";
        this.classList.add('input--error');
        passValidState = false;
        
    } else {

        this.classList.remove('input--error');
        passValidState = true;
    }

}

function checkbox(elem)
{
  
    {
        elem.value ? this.value='false' : this.value='true'
    }
}