<?php Core\View::render('partials/header', ['title' => $title ?? 'Registrace']); ?>

<body>

    <main class="container--center">
        
        <form id="id_form_register" action="" class="form"  method="post">
            
            <h1 class="form__headline">Registrace</h1>
            
            <input id="id_input_email" type="text" name="email" placeholder="Email" >
            
                <p id="id-mail-err" class="form__error-message"><?php echo $_SESSION['email_exists']?></p>
            
            <input id="id_input_pass" type="text" name="password" placeholder="Heslo">
            
                <p id="id-pass-err" class="form__error-message"></p>
            
            <input id="id_input_pass2" type="text" name="password" placeholder="Potvrdit heslo">
            
                <p id="id-pass2-err" class="form__error-message"></p>
            
            <button id="id-btn-register" class="button-main" type="button">Vytvořit účet</button>
            
                <p id="id-all-err" class="form__error-message"></p>

            <div class="form__footer">
                
                <p>Již máte účet?  <a href="/Playlist/">Přihlaste se</a></p>
                
            </div>
            
        </form>
        
    </main>

    <script type="text/javascript"><?php include __DIR__."/js/script_register.js"?></script>

</body>

</html>