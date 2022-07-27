<?php

require_once '../../MODELS/initialize.php';
require_once '../../MODELS/logout.php';

if (isset($_SESSION['userId']) && isset($_GET['user'])) {
    $logout = new Logout("index.php?logout=1");
}else{
    Utility::redirectPage("index.php?logout=0");
}
?>
