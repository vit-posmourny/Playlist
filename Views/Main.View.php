<!----------------------------------- HEADER ------------------------------->

<?php Core\View::render('partials/header', ['title' => $title ?? 'Playlist']); ?>

<body>


<main class="container-hero">

    <!----------------------------- LEVÁ NAVIGACE -------------------------------->
    
    <nav class="nav-left">
        
        <nav class="nav-left-upper mask">
            
            <div class="div-left-upper">

                <button id="id-user-btn" class="button-main width">ID: <?php if (!$_SESSION['logout']) {echo $_SESSION['user_id'];}?></button>
                
                <button id="id-logout-btn" type="button" class="button-main width"><?php if (!$_SESSION['logout']) {echo $_SESSION['user_email'];}?></button>
                
                <button class="button-main width">Token: <?php if (!$_SESSION['logout']) {echo $_SESSION['remember_token'];}?></button>
        
            </div>
            
        </nav>
        
        <nav class="nav-left-bottom">
            
            <nav class="nav-left-bottom-overflow disable-select">
            
                <?php include 'partials/disclosure_nav_genre.php'; ?>
                
            </nav>
            
        </nav>
        
    </nav>
    
    <!--------------------------------- CENTRAL ---------------------------------->
    
    <div class="container-central">
        
        
        <nav class="nav-central-top">
            
            <a id="a-register" href="/Playlist/register"><button id="id-btn-register" class="button-main btn-width letter-spacing">Registrace</button></a>
            
            <a id="a-logout" href="/Playlist/login/logout"><button class="button-main btn-width letter-spacing" type="button">LogOut</button></a>
            
            <a id="a-logon" href="/Playlist/"><button id="id-btn-login-a" class="button-main btn-width letter-spacing">Přihlášení</button></a>
            
        </nav>
        
        <div class="central-bottom">
        
            <!--Něco do "central-bottom"-->
            
        </div>
        
        
    </div>
    
    <!----------------------------- PRAVÁ NAVIGACE ------------------------------->
    
    <div class="nav-right">

        <?php
            if (!$_SESSION['logout'])
            {
                include "partials/playlist_slot.php";
            }
        ?>

    </div>

</main>

<!------------------------------ FOOTER -------------------------------->

<footer class="foot-bottom">

   

</footer>

<!----------------------------- SKRIPTY -------------------------------->

<script type="text/javascript"> <?php include "js\list_play_button.js"?> </script>
<script type="text/javascript"> <?php include "js\disclosure.js"?> </script>

</body>

</html>