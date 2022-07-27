<?php require_once '../../MODELS/initialize.php'; ?>
<?php

if (isset($_GET['delete'])) {
    $deleteSlider = new MySql();
    
    if ($query = $deleteSlider->query("DELETE FROM slider WHERE id = {$_GET['delete']}")) {
        echo("<p>Slider has been deleted </p>");
        echo("&nbsp;&nbsp;<a href=\"{$_SERVER['HTTP_REFERER']}\">Go Back</a>");
    } else {
        echo("<br/>" . $deleteSlider->getdatabaseError());
    }
}
?>