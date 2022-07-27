<?php require_once '../../MODELS/initialize.php'; ?>
<?php

if (isset($_GET['delete'])) {
    $deleteFact = new MySql();
    
    if ($query = $deleteFact->query("DELETE FROM packages WHERE id = {$_GET['delete']}")) {
        echo("<p>Package has been deleted </p>");
        echo("&nbsp;&nbsp;<a href=\"{$_SERVER['HTTP_REFERER']}\">Go Back</a>");
    } else {
        echo("<br/>" . $deleteFact->getdatabaseError());
    }
}
?>