<?php
// OBR. pro IKONA / TLACITKO
$playicon = "\Playlist\images\pause_circle_FILL0_wght300_GRAD0_opsz24.svg";

$index = 0;

echo '<ul class="playlist-main mask">

        <div class="div-overflow-overlay">';


foreach ($playlist as $slot)
{
    echo '
            <li class="playlist-item">
            
                <audio id="myAudio'.$index.'" ontimeupdate="updateTrackTime(this)" class="state_pause audio_class"
                
                        src="'.$slot['track_path'].'">
                </audio>
                
                <img class="playlist-img" src="'.$slot['img_path'].'" alt="cover">
                
                <img id="'.$index.'" class="list-play-icon" onclick="getElementId(event);"
                
                        src="'.$playicon.'" data-track-path="'.$slot['track_path'].' alt="play-icon">
                        
                <div class="slot-text-area">
                
                    <b class="track-name">'.$slot['track_name'].'</b>
                    
                    <div class="inlineFlex">
                        
                        <text class="td-title">'.$slot['album'].'</text>
                        
                        <text id="id-tracktime'.$index.'" class="td-track-time"></text>
                        
                    </div>
                
                </div>
                
            </li>
    ';
        ++$index;
}
echo '</div>

</ul>';