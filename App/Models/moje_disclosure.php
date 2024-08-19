<?php
//$newPath = "C:/xampp/htdocs/Playlist/App/Models";
//set_include_path(get_include_path() . PATH_SEPARATOR . $newPath);
// Include the file that contains the class definition
namespace App\Models;
include "Disclosure.php";


$disclosureObj = new Disclosure();
echo $disclosureObj->ajax_getGenres();

// if (strpos($disclosureObj->getGenres(), $_POST['genre']) !== false)
// {
//     echo "Nalezena shoda";
//
// } else {
//
//     echo "Nenalezena shoda";
// }
//
//
//
?>