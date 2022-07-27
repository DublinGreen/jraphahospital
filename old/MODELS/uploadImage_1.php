<?php

class UploadImage extends File {

    public $formName;
    private $allowedExts = array("jpg", "jpeg", "gif", "png", "JPG", "PNG", "GIF", "JPEG");
    private $extension;
    private $maxUploadSize = 100000000;
    public $sourceFolder = "../admin/upload/";
    private $destinationFolder = "../admin/upload2/";
    private $post_image_Id;

    public function __construct($formName = "file") {
        $this->formName = $formName;
        $this->set_extension();
        $this->prep();
    }

    public function prep() {
        $this->gen_post_image_Id();

        $imageName = "{$_FILES["$this->formName"]["name"]}";
        $renamed = "{$this->post_image_Id}{$_FILES["{$this->formName}"]["name"]}";


        if ((($_FILES["{$this->formName}"]["type"] == "image/gif") ||
                ($_FILES["{$this->formName}"]["type"] == "image/jpeg") ||
                ($_FILES["{$this->formName}"]["type"] == "image/pjpeg")) &&
                ($_FILES["{$this->formName}"]["size"] < $this->maxUploadSize) && in_array($this->extension, $this->allowedExts)) {

            if ($this->errorUploading()) {
                // do errorUploading();
            } else {
                //$this->showImageDetails();
                move_uploaded_file($_FILES["{$this->formName}"]["tmp_name"], "{$this->sourceFolder}" . $_FILES["{$this->formName}"]["name"]);

                copy("{$this->sourceFolder}{$_FILES["{$this->formName}"]["name"]}", "{$this->destinationFolder}{$_FILES["{$this->formName}"]["name"]}");

                if (file_exists("{$this->destinationFolder}{$renamed}")) {
                    $this->gen_post_image_Id();
                }

                rename("{$this->destinationFolder}$imageName", "{$this->destinationFolder}$renamed");

                $_SESSION['post_image_name'] = "$renamed";

//                echo "Stored in: " . "{$this->sourceFolder}" . $_FILES["{$this->formName}"]["name"];
            }
        } else {
            echo("Invalid file");
        }
    }

    private function gen_post_image_Id() {
        $this->post_image_Id = rand(1000, 100000000);
    }

    private function showImageDetails() {
        echo "Upload: " . $_FILES["{$this->formName}"]["name"] . "<br />";
        echo "Type: " . $_FILES["{$this->formName}"]["type"] . "<br />";
        echo "Size: " . ($_FILES["{$this->formName}"]["size"] / 1024) . " Kb<br />";
        echo "Temp file: " . $_FILES["{$this->formName}"]["tmp_name"] . "<br />";
    }

    private function errorUploading() {
        if ($_FILES["{$this->formName}"]["error"] > 0) {
            exit("Return Code: " . $_FILES["{$this->formName}"]["error"] . "<br />");
            return TRUE;
        } else {
            return FALSE;
        }
    }

    private function explodeExtension() {
        return end(explode(".", $_FILES["{$this->formName}"]["name"]));
    }

    private function set_extension() {
        $this->extension = $this->explodeExtension();
    }

    private function resizeJPEG() {
            $imagename = $_FILES['new_image']['name'];
            $source = $_FILES['new_image']['tmp_name'];
            $target = "images/" . $imagename;
            move_uploaded_file($source, $target);

            $imagepath = $imagename;
            $save = "images/" . $imagepath; //This is the new file you saving
            $file = "images/" . $imagepath; //This is the original file

            list($width, $height) = getimagesize($file);


            $tn = imagecreatetruecolor($width, $height);
            $image = imagecreatefromjpeg($file);
            imagecopyresampled($tn, $image, 0, 0, 0, 0, $width, $height, $width, $height);

            imagejpeg($tn, $save, 100);

            $save = "images/sml_" . $imagepath; //This is the new file you saving
            $file = "images/" . $imagepath; //This is the original file

            list($width, $height) = getimagesize($file);

            $modwidth = 600;

            $diff = $width / $modwidth;

            $modheight = 400;
            $tn = imagecreatetruecolor($modwidth, $modheight);
            $image = imagecreatefromjpeg($file);
            imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height);

            imagejpeg($tn, $save, 100);
            //echo "Large image: <img src='images/".$imagepath."'><br>"; 
            echo "Thumbnail: <img src='images/sml_" . $imagepath . "'>";
    }

    public function __destruct() {
        
    }

}

?>