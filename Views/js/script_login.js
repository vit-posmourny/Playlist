let email = document.getElementById('id_input_email');
let pass = document.getElementById('id_input_pass');
let loginBtn = document.getElementById('id-btn-login');
let checkbox = document.getElementById('id-checkbox');
let hiddenCheckbox = document.getElementById('id-hidden-checkbox');


let emailValidState = false;
let passValidState = false;


email.addEventListener("change", emailValidate);
pass.addEventListener("change", passValidate);
loginBtn.addEventListener("click", checkAllStates);
checkbox.addEventListener("change", checkboxF);



function checkboxF()
{
    
    if (this.value === 'false')
    {
        this.value = 'true';
        hiddenCheckbox.value = 'true';
    }
    else {
        this.value = 'false';
        hiddenCheckbox.value = 'false';
    }
    
    
}

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