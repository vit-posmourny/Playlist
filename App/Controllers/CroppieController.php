<?php

namespace App\Controllers;

use Core\View;

class CroppieController
{
    private $msg1 = null;
    private $msg2 = null;
    private $msg3 = null;
    private $msg4 = null;
    private $msg5 = null;
    private $msg6 = null;
    private $msg7 = null;

    private $color = null;

    public function showCroppieDialog()
    {
        return View::render('croppie', [
            'title' => 'Crop User Foto',
            'messages' => [$this->msg1, $this->msg4, $this->msg6],
            'color' => $this->color,
        ]);
    }

    public function uploadAccountImg()
    {
        $target_dir = "images/user/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {

                $uploadOk = 1;
            } else {
                // msg #1
                $this->msg1 = "File is not an image.";
                $this->color = 'red';
                $uploadOk = 0;
            }
        }
        
        // Check if file already exists
        if (file_exists($target_file)) {
            // msg #2
            $msg2 = "Sorry, file already exists. <br>";
            $uploadOk = 0;
        }
        
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            // msg #3
            $msg3 = "Sorry, your file is too large. <br>";
            $uploadOk = 0;
        }
  
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            // msg #4
            $this->msg4 = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        
        if ($uploadOk == 0) {
            // msg #5
            $msg5 = "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } 
        else {
            
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                // msg #6
                $this->msg6 = "Image uploaded successfull.";
                $this->color = "green";
            }
            else {
                // msg #7
                $msg7 = "Sorry, there was an error uploading your file.";
            }
        }
        $this->showCroppieDialog();
    }
}
