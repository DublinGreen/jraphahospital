<?php

class UploadImage extends File {

    public $formName;
    private $maxUploadSize; // this value is in byte so 100000 byte is 1mb 
    private $sourceFolder;
    private $destinationFolder;
    private $postedImageId;
    private $imageName;
    private $renamed;
    private $jpgwidth;
    private $jpgheight;

    public function __construct($formName = "file", $imageFolder = "../admin/upload/", $newImageFolder = "../admin/upload2/", $maxUploadSize = 10000, $modwidth , $modheight) {
        $this->formName = $formName;
        $this->sourceFolder = $imageFolder;
        $this->destinationFolder = $newImageFolder;
        $this->maxUploadSize = $maxUploadSize;
        $this->jpgwidth = $modwidth;
        $this->jpgheight = $modheight;

        $this->prep();
    }

    public function prep() {
        $this->gen_post_image_Id();

        $this->imageName = "{$_FILES["$this->formName"]["name"]}";
        $this->renamed = "{$this->postedImageId}" + $this->imageName;


        $allowedExts = array("jpg", "jpeg", "JPEG");
        $extension = end(explode(".", $_FILES["{$this->formName}"]["name"]));
        if ((($_FILES["{$this->formName}"]["type"] == "image/jpg") || ($_FILES["{$this->formName}"]["type"] == "image/jpeg") || ($_FILES["{$this->formName}"]["type"] == "image/png")) && ($_FILES["{$this->formName}"]["size"] < $this->maxUploadSize) && in_array($extension, $allowedExts)) {


            if ($this->errorUploading()) {
                
            } else {
                move_uploaded_file($_FILES["{$this->formName}"]["tmp_name"], "{$this->sourceFolder}" . $this->imageName);

                copy("{$this->sourceFolder}{$this->imageName}", "{$this->destinationFolder}{$this->imageName}");

                if (file_exists("{$this->destinationFolder}{$renamed}")) {
                    $this->gen_post_image_Id();
                    rename("{$this->destinationFolder}$this->imageName", "{$this->destinationFolder}$this->renamed" . ".jpeg");
                }

                $_SESSION['postedImageName'] = "$this->renamed" . ".jpeg";
//                echo($_SESSION['postedImageName']);
                $this->resizeJPEG();
            }
        } else {
            exit("Invalid file , Upload only jpeg , png , gif images below 2MB in size.<br/><a href=\"{$_SERVER['HTTP_REFERER']}\">Go Back</a>");
        }
    }

    private function gen_post_image_Id() {
        $this->postedImageId = rand(1000, 100000000);
    }

    public function showImageDetails() {
        echo "Upload: " . $_FILES["{$this->formName}"]["name"] . "<br />";
        echo "Type: " . $_FILES["{$this->formName}"]["type"] . "<br />";
        echo "Size: " . ($_FILES["{$this->formName}"]["size"] / 1024) . " Kb<br />";
        echo "Temp file: " . $_FILES["{$this->formName}"]["tmp_name"] . "<br />";
        echo "Original stored in: " . "{$this->sourceFolder}" . $this->imageName;
        echo "Renamed stored in: " . "{$this->destinationFolder}" . $this->imageName;
    }

    private function errorUploading() {
        if ($_FILES["{$this->formName}"]["error"] > 0) {
            exit("Return Code: " . $_FILES["{$this->formName}"]["error"] . "<br />");
            return TRUE;
        } else {
            return FALSE;
        }
    }

    private function resizeJPEG() {
//        echo("<br/>{$this->destinationFolder}$this->renamed" . ".jpeg");
        $file = "{$this->destinationFolder}$this->renamed" . ".jpeg";
        list($width, $height) = getimagesize($file);

        $save = "$this->destinationFolder" . "_sml$this->renamed" . ".jpeg";

        list($width, $height) = getimagesize($file);

        $modwidth = $this->jpgwidth;
        $modheight = $this->jpgheight;

        $diff = $width / $modwidth;

        $tn = imagecreatetruecolor($modwidth, $modheight);
        $image = imagecreatefromjpeg($file);
        imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height);

        imagejpeg($tn, $save, 100);
        echo("Thumbnail <img src='{$save}' />");

    }

    public function __destruct() {
        
    }

}

?>