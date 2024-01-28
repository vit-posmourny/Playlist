<?php

$playicon = "\Playlist\images\pause_circle_FILL0_wght300_GRAD0_opsz24.svg";
$index = 0;

echo '<ul class="player__playlist list">';

foreach ($playlist as $song)
{
    
    echo '
        <li class="player__song">
        
            <audio id="myAudio'.$index.'" ontimeupdate="getCurrTime()" class="state_pause audio_class" src="'.$song['track_path'].'"></audio>
            
            <img class="player__img img" src="'.$song['img_path'].'" alt="cover">
            
            <img id="'.$index.'" class="list_play_icon" onclick="getElementId(event)"  src="'.$playicon.'" data-track-path="'.$song['track_path'].' alt="play-icon">
            
            <p class="player__context">
                
                <b class="player__track-name">'.$song['track_name'].'</b>
                <span class="flex">
                        <span class="player__title">'.$song['album'].'</span>
                        <span id="id-tracktime'.$index.'" class="player__track-time"></span>
                </span>
            </p>
    
        </li>
    ';
    ++$index;
}

echo '</ul>';