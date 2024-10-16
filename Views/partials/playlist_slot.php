<?php
// používá na překlad žánrů z číselných řětězců na názvy žánrů
include 'genres.php';

// IKONA pro list-play-icon
$playicon = "\Playlist\images\play_circle_FILL0_wght300_GRAD0_opsz24.svg";
$index_playlist = 0;

echo '<ul class="playlist-main mask">

        <div class="div-overflow-auto">';


foreach ($playlist as $slot) {
    
    $string = $slot['genres'];
    $delimiter = ":";
    // Split the string into an array using the delimiter
    $explodeArr = explode($delimiter, $string);
    // array_shift usekne prvni prvek pole - kdyz $string obsahuje napr :4, explode() vrati
    // v prvnim prvku pole "" a ve slotu zacina seznam zanru carkou
    array_shift($explodeArr);
    $slotGenres = null;
    $lenght = sizeof($explodeArr);
    
    for ($i=0; $i < $lenght; $i++)
    {
        if ($i === $lenght-1)
        {
            $slotGenres .= $genres[$explodeArr[$i]];
            break;
        }
        $slotGenres .= $genres[$explodeArr[$i]].', ';
    }
    
    echo '
            <li class="playlist-item">
            
                <audio id="track-slot_'.$index_playlist.'" ontimeupdate="updateTrackTime(this)" class="state_pause slot_class"
                
                        src="'.$slot['track_path'].'">
                </audio>
                
                <img class="playlist-img" src="'.$slot['img_path'].'" alt="cover">
                
                <img id="'.$index_playlist.'" class="list-play-icon" onclick="getListPlayIconId(event);"
                
                        src="'.$playicon.'" data-track-path="'.$slot['track_path'].'" alt="play-icon">
                        
                <div class="slot-text-area">
                
                    <b class="track-name">'.$slot['track_name'].'</b>
                    
                        <text class="td-title">'.$slot['album'].'</text>
                    
                    <div class="inlineFlex">
                        
                        <text class="td-genre">'.$slotGenres.'</text>
                        
                        <text id="id-tracktime'.$index_playlist.'" class="td-track-time"></text>
                        
                    </div>
                
                </div>
                
            </li>
    ';
        ++$index_playlist;
}
echo '</div>

</ul>';