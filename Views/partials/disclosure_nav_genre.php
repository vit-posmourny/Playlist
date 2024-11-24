<?php

include 'genres.php';
// 'genres' puvodne je název sloupce z tabulky disclosure
// jeste v souboru MainController.php je assocArrayOfGenres klic k asociativnimu poli, ktere vraci v
// clenska funkce getGenres() tridy Disclosure.php a ve tride View.php je z tohoto klice vytvoren
// nazev promenne, do ktere je prirazena jako hodnota assoc.pole navracene fci. Disclosure::getGenres()
$string = $assocArrayOfGenres['genres'];
$delimiter = ":";
// Split the string into an array using the delimiter
$explodeArr = explode($delimiter, $string);

$index_summary = 1;

foreach ($explodeArr as $genre)
{
    echo '
    <details>
        <summary id="'.$genres[$genre].'" class="nav-left-bottom-summary"><h2>'.$genres[$genre].'</h2></summary>
        <ul class="content">';
        $interpret = [];
        
        // $playlist sem donáší Core/View.php
        foreach ($playlist as $line)
        {
            $str = $line['genres'];
            $pattern = "/:$genre:/";
            if (preg_match($pattern, $str))
            {
                if (!($interpret[$line['interpret']]))
                {
                    $interpret = array($line['interpret'] => "1");
                    echo '<li>&bull; '.$line['interpret'].'</li>';
                }
            }
        }
    echo '</ul>
    </details>
    ';
    $index_summary++;
}
?>