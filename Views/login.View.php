<?php $_POST['login-checkbox'] = false; ?>
<?php Core\View::render('partials/header', ['title' => $title ?? 'Login']); ?>

<body >
    
    <main  class="container--center">

        <form id="id_form_login" action="" class="form" name="name_form" method="post">
            
            <h1 class="form__headline">Přihlásit se</h1>
            
            <input id="id_input_email" name="email" type="text" placeholder="Email">
            
                <p id="id-mail-err" class="form__error-message"></p>
            
            <input id="id_input_pass" name="password" type="text" placeholder="Heslo">
            
                <p id="id-pass-err" class="form__error-message"></p>
            
            <button id="id-btn-login" class="button-main" type="button">Přihlášení</button>
            
                <p id="id-all-err" class="form__error-message"></p>
            
            <input id="id-hidden-checkbox" type="hidden" name="hidden-checkbox" value='false'>
            
                <?php
                if(isset($error))
                {
                    echo'<p class="form__error-message">'.$error.'</p>';
                }
                ?>
            
            
            <div class="form__footer">
                
                <p>Zapamatovat si přihlášení</p><input id="id-checkbox" type="checkbox" name="login-checkbox" value='false'>
                <p>Nemáte účet?  <a href="/Playlist/register">Vytvořte si ho</a></p>
                
            </div>
            
        </form>
        
    </main>

    <script type="text/javascript"><?php include __DIR__."/js/script_login.js"?></script>
  
</body>

</html>