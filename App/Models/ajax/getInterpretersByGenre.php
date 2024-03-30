<?php

namespace App\Models\ajax;
include '..\..\..\genres_inv.php';
require_once '../Disclosure.php';

//die(print_r($_POST['functionName']));


getInterpretersByGenre($_POST['genres']);