<?php require_once '../../MODELS/initialize.php'; ?>
<?php

if (isset($_POST['submit'])) {
    $addSlider = new MySql();
//    echo($_POST['title']);
    $uploadPackageImage = new UploadImage("image", "packageImages/", "savedPackageImages/", 5000000, 1350, 500);
    echo $_SESSION['postedImageName'];
    $title = $addSlider->escapeValues($_POST['title']);
    
    if ($query = $addSlider->query("INSERT INTO slider(title,image) VALUES ('{$title}','{$_SESSION['postedImageName']}')")) {
        echo("<p>Slider has been added </p>");
        echo("&nbsp;&nbsp;<a href=\"{$_SERVER['HTTP_REFERER']}\">Go Back</a>");
    } else {
        echo("<br/>" . $addSlider->getdatabaseError());
    }
}
?>