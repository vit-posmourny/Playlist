<?php $_POST['login-checkbox'] = false; ?>
<?php Core\View::render('partials/header', ['title' => $title ?? 'Login']); ?>

<body class="container--center">

        <form id="form-login" action="" class="form-login" name="name_form" method="post">
            
            <h1 class="form__headline">Přihlásit se</h1>
            
            <input id="input-email" name="email" type="text" placeholder="Email">
            
                <p id="mail-error" class="form__error-message letter-spacing flogin_size"><?php echo $_SESSION['wrong_email'];?></p>
            
            <input id="input-pass" name="password" type="text" placeholder="Heslo">
            
                <p id="pass-error" class="form__error-message letter-spacing flogin_size"><?php echo $_SESSION['wrong_password'];?></p>
                    
            <button id="id-btn-login-b" class="button_main letter-spacing" type="button">Přihlášení</button>
            
                <p id="all-error" class="form__error-message letter-spacing flogin_size"></p>
            
            <input id="id-hidden-checkbox" type="hidden" name="hidden-checkbox" value='false'>

            
            <div class="form__footer letter-spacing">
                
                <p>Zapamatovat si přihlášení <input id="id-checkbox" type="checkbox" name="login-checkbox" value='false'></p>
                <p style="padding-bottom: 1em">Nemáte účet? <a href="/Playlist/register">Vytvořte si ho</a></p>
                
            </div>
            
        </form>

    <script type="text/javascript"><?php include __DIR__."/js/script_login.js"?></script>
  
</body>

</html>