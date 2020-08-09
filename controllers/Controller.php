<?php

class Controller
{
    /***
     * Affichage de la vue
     */
    public function render($vue, array $params = [])
    {
       
       if(!empty($params))
       {
            foreach($params as $key => $value)
            {
                ${$key} = $value;
    
            }
       }
        require "views/$vue.php";
    }

    /***
     * Redirection 
     */
    public function redirectTo($class, $action = "index", array $params = [])
    {
        
        $attributes = "";
        if(!empty($params))
       {
            foreach($params as $key => $value)
            {
                $attributes = $attributes."&".$key."=".$value;    
                
            }
       }
        header("Location: index.php?class=$class&action=$action".$attributes);
    }

    public function uploadImage(string $target_dir, string $file_input_name)
    {
        
        if($_FILES[$file_input_name]["error"] == 0){


            $target_file = $target_dir . basename($_FILES[$file_input_name]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

            $check = getimagesize($_FILES[$file_input_name]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
               
            }


// Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
               
            }

// Check file size
            if ($_FILES[$file_input_name]["size"] > 5000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
              
            }

// Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
                
            }

// Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                return false;
// if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES[$file_input_name]["tmp_name"], $target_file)) {
                    return basename( $_FILES[$file_input_name]["name"]);
                } else {
                    echo "Sorry, there was an error uploading your file.";
                   
                    return false;
                }
            }
        }else{
           
            return false;
        }
    }

}