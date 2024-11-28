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
                echo "<script> alert('File is not an image.'); </script>";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists. <br>";
            $uploadOk = 0;
        }
  
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large. <br>";
            $uploadOk = 0;
        }
  
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "<script> alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.') </script>";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
        } 
        else {
            
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                header('location: /Playlist/croppie');
            }
            else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
