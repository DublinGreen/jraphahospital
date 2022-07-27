<?php require_once '../../MODELS/initialize.php'; ?>
<?php

if (isset($_POST['submit'])) {
    $addPackage = new MySql();

    $uploadPackageImage = new UploadImage("image", "packageImages/", "savedPackageImages/", 2000000, 500, 500);
    $mainImage = $_SESSION['postedImageName'];
    $uploadPackageImage2 = new UploadImage("image2", "packageImages/", "savedPackageImages/", 2000000, 500, 500);
    $image2 = $_SESSION['postedImageName'];
    $uploadPackageImage3 = new UploadImage("image3", "packageImages/", "savedPackageImages/", 2000000, 500, 500);
    $image3 = $_SESSION['postedImageName'];
    $uploadPackageImage4 = new UploadImage("image4", "packageImages/", "savedPackageImages/", 2000000, 500, 500);
    $image4 = $_SESSION['postedImageName'];
    $uploadPackageImage5 = new UploadImage("image5", "packageImages/", "savedPackageImages/", 2000000, 500, 500);
    $image5 = $_SESSION['postedImageName'];


    $tourDescription = $addPackage->escapeValues($_POST['description']);
    $tourName = $addPackage->escapeValues($_POST['name']);
    $duration = $addPackage->escapeValues($_POST['duration']);
    $adultPrice = $addPackage->escapeValues($_POST['adult_price']);
    $childPrice = $addPackage->escapeValues($_POST['child_price']);
    $currency = $addPackage->escapeValues($_POST['currency']);
    $condition = $addPackage->escapeValues($_POST['condition']);
    $includes = $addPackage->escapeValues($_POST['includes']);
    $excludes = $addPackage->escapeValues($_POST['excludes']);
    
    

    if ($query = $addPackage->query("INSERT INTO packages(name , description , image , image2 , image3 , image4 , image5, added_by) 
        VALUES ('{$tourName}','{$tourDescription}','{$mainImage}','{$image2}','{$image3}','{$image4}','{$image5}','{$_SESSION['userId']}')")) {
        echo("<p>Facility has been added </p>");
        echo("&nbsp;&nbsp;<a href=\"{$_SERVER['HTTP_REFERER']}\">Go Back</a>");
    } else {
        echo("<br/>" . $addPackage->getdatabaseError());
    }
}
?>