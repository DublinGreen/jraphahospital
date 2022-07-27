<?php require_once 'initialize.php'; ?>

<?php

#In this script we add some restrictions to the file upload.
# The user may upload .gif, .jpeg, and .png files; and the file size must be under 20 MB:

$allowedExts = array("jpeg", "jpg");
$extension = end(explode(".", $_FILES["new_image"]["name"]));
if ((($_FILES["new_image"]["type"] == "image/jpeg") || ($_FILES["new_image"]["type"] == "image/jpg") ||
        ($_FILES["new_image"]["type"] == "image/pjpeg")) && ($_FILES["new_image"]["size"] < 2000000)
        && in_array($extension, $allowedExts)) {
    if ($_FILES["new_image"]["error"] > 0) {
        exit(" Return Code: {$_FILES['file']['error']} . <br>");
    } else {
        echo "Upload: " . $_FILES["new_image"]["name"] . "<br>";
        echo "Type: " . $_FILES["new_image"]["type"] . "<br>";
        echo "Size: " . ($_FILES["new_image"]["size"] / 1024) . " kB<br>";
        echo "Temp file: " . $_FILES["new_image"]["tmp_name"] . "<br>";

        if (file_exists("images" . $_FILES["new_image"]["name"])) {
            echo $_FILES["new_image"]["name"] . " already exists. ";
        } else {
            
        }
    }
}








if (isset($_POST['submit'])) {
    if (isset($_FILES['new_image'])) {
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
}


$connection = mysql_connect(HOST, USERNAME, PASSWORD);
$db = mysql_select_db(DATABASE_NAME);
$image_name = $_FILES["new_image"]["name"];
$property_name = $_POST['property_name'];
$cost = $_POST['property_cost'];
$description = $_POST['property_description'];
$location = $_POST['property_location'];
$currency = $_POST['property_currency'];
$contactPerson = $_POST['contact_person'];
$poster = $_POST['poster_by'];
$timePosted = time();
$state = $_POST['states'];
$keywords = $_POST['property_keywords'];
$sql = "INSERT INTO properties (id,image_path,description,cost,property_name,location,currency,contact_person,poster,time_posted,state,keyword) 
        VALUES('','{$image_name}','{$description}','{$cost}','{$property_name}','{$location}','{$currency}','{$contactPerson}','{$poster}','{$timePosted}','{$state}','{$keywords}')";
if ($query = mysql_query($sql)) {
    //echo "<br/>sent to database<br/>";
} else {
    echo "<br/>not sent to database" . mysql_error() . "<br/>";
}
$close = mysql_close($connection);



echo "<br/><br/><br/><a href=\"{$_SERVER['HTTP_REFERER']}\">Go Back</a>";
?> 
