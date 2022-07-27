<?php require_once '../../MODELS/initialize.php'; ?>
<?php

if (isset($_POST['submit'])) {
    $addFact = new MySql();
//    echo($_POST['title']);
    $fact = $addFact->escapeValues($_POST['fact']);
    
    if ($query = $addFact->query("INSERT INTO facts(fact) VALUES ('{$fact}')")) {
        echo("<p>Fact has been added </p>");
        echo("&nbsp;&nbsp;<a href=\"{$_SERVER['HTTP_REFERER']}\">Go Back</a>");
    } else {
        echo("<br/>" . $addFact->getdatabaseError());
    }
}
?>