<?php require_once '../../MODELS/initialize.php'; ?>
<?php

if (isset($_GET['delete'])) {
    $deleteVacancy = new MySql();
    
    if ($query = $deleteVacancy->query("DELETE FROM vacancy WHERE id = {$_GET['delete']}")) {
        echo("<p>Vacancy has been deleted </p>");
        echo("&nbsp;&nbsp;<a href=\"{$_SERVER['HTTP_REFERER']}\">Go Back</a>");
    } else {
        echo("<br/>" . $deleteVacancy->getdatabaseError());
    }
}else{
    Utility::redirectPage("../door/dashboard.php");
}
?>