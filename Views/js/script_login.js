let email = document.getElementById('input-email');
let pass = document.getElementById('input-pass');
let loginBtn = document.getElementById('id-btn-login-b');
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
        let form = document.getElementById('form-login');
        form.setAttribute('action', '/Playlist/login');
        form.submit();

    } else {
        
        document.getElementById('all-error').innerHTML = "Vyplňte prosím všechny údaje.";
    }
}


function emailValidate()
{
    if (!(this.value.includes('@') && this.value.includes('.')))
    {
        this.classList.add('input--error');
        document.getElementById('mail-error').innerHTML = 'Emailová adresa musí obsahovat @ a \"<b>.</b>\".';
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
        document.getElementById('pass-error').innerHTML = "Heslo musí být alespoň <b>8</b> znaků dlouhé.";
        this.classList.add('input--error');
        passValidState = false;
        
    } else {

        this.classList.remove('input--error');
        passValidState = true;
    }
}