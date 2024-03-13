<?php

include 'genres.php';
// 'genres' je název klíče z pole přiřazeného do prom. $disclosure_nav v Core\View (původně také název klíče, ještě v MainController.php)
$string = $disclosure_nav['genres'];
$delimiter = ":";
// Split the string into an array using the delimiter
$explodeArr = explode($delimiter, $string);


foreach ($explodeArr as $genre)
{
    echo '
    <details>
        <summary><h2>'.$genres[$genre].'</h2></summary>
        <ul>
            <li>1</li>
        </ul>
    </details>
    ';
}
?>