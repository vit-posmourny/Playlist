<?php Core\View::render('partials/header', ['title' => $title ?? 'Playlist']); ?>

<body>

<main class="container-hero">

    
    <nav class="nav-left">
        
        <div class="nav-left-upper">
        
        <button class="button-main width">
            <img src="\Playlist\images\home_FILL0_wght400_GRAD0_opsz24.svg" alt="Home">
        </button>
        <button class="button-main width"></button>
        <button class="button-main width"></button>
        
        </div>
        <div class="nav-left-bottom">
        
        
        
        </div>
        
    </nav>
    
    
    <div class="container-central">
        
        
        <nav class="nav-central-top">
            
            <!--Tlačítko přidat uživatele-->
            
            <form action="/Playlist/register" method="get">
            
                <button id="id-btn-addUser" class="button-main" type="submit">Registrace</button>
            
            </form>
            
            <a href="/Playlist/login"><button id="id-btn-login" class="button-main">Přihlášení</button></a>
            
        </nav>
        
        <div>
            
            <img src="images/music-notes-gif-transparent-5.png" alt="">
            
        </div>
        

    </div>



    <div class="nav-right">

        <?php include "partials/playlist.php"; ?>

    </div>


</main>


<nav class="nav-bottom">

    <?php include "partials\mainAudio.php"; ?>

</nav>

<script type="text/javascript"><?php include "js\list_play_button.js"?></script>

</body>

</html>