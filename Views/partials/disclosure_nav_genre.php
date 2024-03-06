<?php

include 'genres.php';

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
            <li> 2</li>
            <li> 3</li>
            <li> 4</li>
            <li> 5</li>
        </ul>
    </details>
    ';
}
?>