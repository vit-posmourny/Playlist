<?php

$playicon = "\Playlist\images\play_circle_FILL0_wght300_GRAD0_opsz24.svg";
$index = 0;

echo '<ul class="player__playlist list">';

foreach ($playlist as $song)
{
    
    echo '
        <li class="player__song">
            
            <img class="player__img img" src="'. $song['img_path'] .'" alt="cover">
            
            <img id="'.$index.'" class="list_play_icon" src="' .$playicon. '" alt="play-icon">
            
            <p class="player__context">
                
                <b class="player__track-name">'. $song['track_name'] .'</b>
                <span class="flex">
                        <span class="player__title">'. $song['album'] .'</span>
                        <span class="player__track-time">3:58</span>
                </span>
            </p>
    
        </li>
    ';
    ++$index;
}

echo '</ul>';