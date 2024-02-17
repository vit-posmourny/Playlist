<!----------------------------------- HEADER ------------------------------->

<?php Core\View::render('partials/header', ['title' => $title ?? 'Playlist']); ?>

<body>


<main class="container-hero">

    <!----------------------------- LEVÁ NAVIGACE -------------------------------->
    
    <nav class="nav-left">
        
        <div class="nav-left-upper">

            <button id="id-user-btn" class="button-main width">ID: <?php if (!$_SESSION['logout']) {echo $_SESSION['user_id'];}?></button>
            
            <button id="id-logout-btn" type="button" class="button-main width"><?php if (!$_SESSION['logout']) {echo $_SESSION['user_email'];}?></button>
            
            <button class="button-main width">Token: <?php if (!$_SESSION['logout']) {echo $_SESSION['remember_token'];}?></button>

        </div>
        
        <div class="nav-left-bottom">
        
        
        
        </div>
        
    </nav>
    
    <!--------------------------------- CENTRAL ---------------------------------->
    
    <div class="container-central">
        
        
        <nav class="nav-central-top">
            
            <a href="/Playlist/register"><button id="id-btn-register" class="button-main">Registrace</button></a>
            
            <a id="a-logout" href="/Playlist/login/logout"><button class="button-main btn-logout-width" type="button">LogOut</button></a>
            
            <a href="/Playlist/"><button id="id-btn-login" class="button-main">Přihlášení</button></a>
            
        </nav>
        
        <div class="central-bottom">
        
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

</body>

</html>