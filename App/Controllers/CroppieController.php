<?php

namespace App\Controllers;

use Core\View;

class CroppieController
{
    public function showCroppieDialog()
    {
        return View::render('croppie', [
            'title' => 'Crop User Foto',
        ]);
    }
}