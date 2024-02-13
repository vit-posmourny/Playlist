<?php
// OBR. pro IKONA / TLACITKO
$playicon = "\Playlist\images\pause_circle_FILL0_wght300_GRAD0_opsz24.svg";

$index = 0;

echo '<ul class="playlist-main mask">

        <div class="div-for-li">';


foreach ($playlist as $song)
{
    echo '
        <li class="playlist-item">
        
            <audio id="myAudio'.$index.'" ontimeupdate="updateTrackTime(this)" class="state_pause audio_class"
            
                    src="'.$song['track_path'].'">
                    
            </audio>
            
            <img class="playlist-img img" src="'.$song['img_path'].'" alt="cover">
            
            <img id="'.$index.'" class="list-play-icon" onclick="getElementId(event);"
            
                    src="'.$playicon.'" data-track-path="'.$song['track_path'].' alt="play-icon">
            
            <div class="song-text-area">
            
                <b class="track-name">'.$song['track_name'].'</b>
                
                <div class="inlineFlex">
                    
                        <text class="td-title">'.$song['album'].'</text>
                        
                        <text id="id-tracktime'.$index.'" class="td-track-time"></text>
                    
                </div>
            
            </div>
            
        </li>
    ';
    
    ++$index;
}
echo '</div>

</ul>';