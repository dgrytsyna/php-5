<?php

$message = '';
$typeError = '';
$sizeError = '';

if(isset($_POST['submit'])){
    for($i=0; $i<count($_FILES['myFile']['tmp_name']); $i++){
        $name = $_FILES['myFile']['name'][$i];
        $type = $_FILES['myFile']['type'][$i];
        $size = $_FILES['myFile']['size'][$i];
        $tmp_name = $_FILES['myFile']['tmp_name'][$i];
        $error = $_FILES['myFile']['error'][$i];
         $uploads_dir = 'uploads/';
         $uploadfile = $uploads_dir . basename($_FILES['myFile']['name'][$i]);
        if ($size > 1000000) {
           $sizeError = 'Exceeded filesize limit';
           echo "<p>$sizeError - $name</p>";
           exit;
        } else{
            $checkedSize = 1;
        };
        
            if($type == 'image/jpeg' || $type == 'image/png'|| $type == 'image/gif' || $type == 'image/jpg'){
                $checkedType = 1;
            }else{
                $typeError = "Unexepted type";
                echo "<p>$typeError - $name</p>";
                 exit;
            };
        switch($error){
            case 0:
            $message = "No errors";
            break;
            case 1:
                $message = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
                break;
            case 2:
                $message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
                break;
            case 3:
                $message = "The uploaded file was only partially uploaded";
                break;
            case 4:
                $message = "No file was uploaded";
                break;
            case 6:
                $message = "Missing a temporary folder";
                break;
            case 7:
                $message = "Failed to write file to disk";
                break;
            case 8:
                $message = "File upload stopped by extension";
                break;

            default:
                $message = "Unknown upload error";
                break;
        };
  
    if($checkedSize == 1 && $checkedType == 1 && $error == 0 ){
        move_uploaded_file($tmp_name,  $uploadfile);
        echo "Success! Your file was uploaded";
        }else{
            echo "<p>$message - $name</p>";
        };

        
    }; 
 
    };


?>