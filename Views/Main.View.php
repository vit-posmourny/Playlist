<!----------------------------------- HEADER ------------------------------->

<?php Core\View::render('partials/header', ['title' => $title ?? 'Playlist']); ?>

<body>


<main class="container-hero">

    <!----------------------------- LEVÁ NAVIGACE -------------------------------->
    
    <nav class="nav-left">
        
        <nav class="nav-left-upper mask">

            <?php include 'partials/user_modal.php'; ?>
            
            <div class="div-left-upper">

                <div id="d-user-btn-cont" class="width">
                    <button id="b-user-btn" class="button_main"><?php if (!$_SESSION['logout']) {echo $_SESSION['user_email'];}?></button>
                    <button id="b-user-arrow" class="button_main" popovertarget="d-usracc-modal"></button>
                </div>
                
                <a id="a-logout" href="/Playlist/login/logout" class="width"><button class="button_main letter-spacing" type="button" style="width: 100%;">LogOut</button></a>

                <a id="a-logon" href="/Playlist/" class="width"><button id="id-btn-login-a" class="button_main btn-width letter-spacing" style="width: 100%;">Přihlášení</button></a>
                
                <a id="a-register" href="/Playlist/register" class="width"><button id="id-btn-register" class="button_main btn-width letter-spacing" style="width: 100%;">Registrace</button></a>
        
            </div>
            
        </nav>
        
        <nav class="nav-left-bottom">
            
            <nav class="nav-left-bottom-overflow disable-select scrollable">
            
                <?php include 'partials/disclosure_nav_genre.php'; ?>
                
            </nav>
            
        </nav>
        
    </nav>
    
    <!--------------------------------- CENTRAL ---------------------------------->
    
    <div class="container-central">
        
        
        <nav class="nav-central-top"></nav>
        
        <div class="central-bottom"></div>
        
        
    </div>
    
    <!----------------------------- PRAVÁ NAVIGACE ------------------------------->
    
    <div class="nav-right disable-select">

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

<script type="text/javascript"> <?php include "js\slot_play_button.js"?> </script>
<script type="text/javascript"> <?php include "js\disclosure.js"?> </script>
<script type="text/javascript"> <?php include "js\croppie_modal.js"?> </script>

</body>

</html>