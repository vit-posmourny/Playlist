<?php Core\View::render('partials/header', ['title' => $title ?? 'Playlist']); ?>

<body>

<main class="container-hero">

    <!----------------------------- LEVÁ NAVIGACE -------------------------------->
    
    <nav class="nav-left">
        
        <div class="nav-left-upper">
        
            <button class="button-main width"></button>
            <button class="button-main width"></button>
            <button class="button-main width"></button>
        
        </div>
        
        <div class="nav-left-bottom">
        
        
        
        </div>
        
    </nav>
    
    <!--------------------------------- CENTRAL ---------------------------------->
    
    <div class="container-central">
        
        
        <nav class="nav-central-top">
            
            <a href="\Playlist\register"><button id="id-btn-reg" class="button-main">Registrace</button></a>
            
            <a href="/Playlist/login"><button id="id-btn-login" class="button-main">Přihlášení</button></a>
            
        </nav>
        
        
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