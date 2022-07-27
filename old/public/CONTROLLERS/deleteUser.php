<?php

require_once '../../MODELS/initialize.php';

if (isset($_POST['deleteSubmit'])) {
    $deleteThisUser = new MySql();
    if($query = $deleteThisUser->query("DELETE FROM users WHERE id = {$_POST['deleteUser']} LIMIT 1")){
        Utility::redirectPage("../door/editDelete.php?userDelete=1");
    }else{
        echo($deleteThisUser->getdatabaseError());
    }
}
?>