<?php $_POST['login-checkbox'] = false; ?>
<?php Core\View::render('partials/header', ['title' => $title ?? 'Login']); ?>

<body class="container--center">

        <form id="id_form_login" action="" class="form-login" name="name_form" method="post">
            
            <h1 class="form__headline">Přihlásit se</h1>
            
            <input id="id_input_email" name="email" type="text" placeholder="Email">
            
                <p id="id-mail-err" class="form__error-message letter-spacing"><?php echo $_SESSION['wrong_email'];?></p>
            
            <input id="id_input_pass" name="password" type="text" placeholder="Heslo">
            
                <p id="id-pass-err" class="form__error-message letter-spacing"><?php echo $_SESSION['wrong_password'];?></p>
                    
            <button id="id-btn-login-b" class="button-main letter-spacing" type="button">Přihlášení</button>
            
                <p id="id-all-err" class="form__error-message letter-spacing"></p>
            
            <input id="id-hidden-checkbox" type="hidden" name="hidden-checkbox" value='false'>

            
            <div class="form__footer letter-spacing">
                
                <p>Zapamatovat si přihlášení <input id="id-checkbox" type="checkbox" name="login-checkbox" value='false'></p>
                <p style="padding-bottom: 1em">Nemáte účet? <a href="/Playlist/register">Vytvořte si ho</a></p>
                
            </div>
            
        </form>

    <script type="text/javascript"><?php include __DIR__."/js/script_login.js"?></script>
  
</body>

</html>