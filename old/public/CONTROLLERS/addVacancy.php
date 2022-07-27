<?php require_once '../../MODELS/initialize.php'; ?>
<?php

if (isset($_POST['submit'])) {
    $addVacancy = new MySql();
    $date = $addVacancy->escapeValues($_POST['date']);
    $description = $addVacancy->escapeValues($_POST['description']);
    $requirements = $addVacancy->escapeValues($_POST['requirements']);
    
    if ($query = $addVacancy->query("INSERT INTO vacancy (end_date , description , requirements) 
        VALUES ('{$date}','{$description}' ,'{$requirements}')")) {
        echo("<p>Vacancy has been added </p>");
        echo("&nbsp;&nbsp;<a href=\"{$_SERVER['HTTP_REFERER']}\">Go Back</a>");
    } else {
        echo("<br/>" . $addVacancy->getdatabaseError());
    }
}
?>