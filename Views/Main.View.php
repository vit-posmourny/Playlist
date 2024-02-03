<?php
//    setcookie('remember_token', $_SESSION['remember_token'], time() + (86400 * 30), "/"); // 86400 = 1 day

if(!isset($_COOKIE['remember_token']))
{
    header('location: /Playlist/login');
}


?>
<?php Core\View::render('partials/header', ['title' => $title ?? 'Playlist']); ?>

<body>


<main class="container-hero">

    <!----------------------------- LEVÁ NAVIGACE -------------------------------->
    
    <nav class="nav-left">
        
        <div class="nav-left-upper">
            
                <button id="id-user-btn" class="button-main width">ID: <?php echo $_SESSION['user_id'];?></button>
                <button id="id-logout-btn" type="button" class="button-main width"><?php echo $_SESSION['user_email'];?></button>
                <button class="button-main width">Token: <?php echo $_SESSION['remember_token'];?></button>
        
        </div>
        
        <div class="nav-left-bottom">
        
        
        
        </div>
        
    </nav>
    
    <!--------------------------------- CENTRAL ---------------------------------->
    
    <div class="container-central">
        
        
        <nav class="nav-central-top">
            
            <a href="\Playlist\register"><button id="id-btn-reg" class="button-main">Registrace</button></a>
            
            <button class="button-main width" types="submit" formaction="/Playlist/login/logout/">LogOut</button>
            
            <a href="/Playlist/login"><button id="id-btn-login" class="button-main">Přihlášení</button></a>
            
        </nav>
        
        <div class="central-bottom">
        
        </div>
        
        
    </div>
    
    <!----------------------------- PRAVÁ NAVIGACE ------------------------------->
    
    <div class="nav-right">

        <?php include "partials/playlist.php"; ?>

    </div>

</main>

<!------------------------------ FOOTER -------------------------------->

<footer class="foot-bottom">

   

</footer>

<!----------------------------- SKRIPTY -------------------------------->

<script type="text/javascript"> <?php include "js\list_play_button.js"?> </script>

</body>

</html>