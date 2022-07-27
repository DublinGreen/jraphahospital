<?php

require_once '../../MODELS/initialize.php';

if (isset($_POST['submit'])) {
//    echo($_POST['username'] . "<br/>");
//    echo($_POST['email'] . "<br/>");
//    echo($_POST['password'] . "<br/>");
//    echo($_POST['rank'] . "<br/>");

    $_POST['username'] != '' ? $username = $_POST['username'] : $username = NULL;
    $_POST['email']  != '' ? $email = $_POST['email'] : $email = NULL;
    $_POST['password']  != '' ? $password = $_POST['password'] : $password = NULL;
    $_POST['rank'] != '' ? $rank = $_POST['rank'] : $rank = NULL;
//
//    echo($username);
//    echo($email);
//    echo($password);
//    echo($rank);
//    echo("<br/>");
    
   $message = "The following has been updated";
    
    if (!is_null($username)) {
        $usernameDB = new MySql();
        if ($query = $usernameDB->query("UPDATE users SET username = '{$username}' WHERE id = {$_SESSION['userId']}")) {
            $message .= " username , ";
        }
    }

    if (!is_null($email)) {
        $emailDB = new MySql();
        if ($query = $emailDB->query("UPDATE users SET email = '{$email}' WHERE id = {$_SESSION['userId']}")) {
            $message .= " email , ";
        }
    }

    if (!is_null($password)) {
        $passwordDB = new MySql();
        $hashPassword = Utility::hashpassword($password);
        if ($query = $passwordDB->query("UPDATE users SET password = '{$hashPassword}' WHERE id = {$_SESSION['userId']}")) {
            $message .= " password , ";
        }
    }

    if (!is_null($rank)) {
        $rankDB = new MySql();
        if ($query = $rankDB->query("UPDATE users SET rank = '{$rank}' WHERE id = {$_SESSION['userId']}")) {
            $message .= " rank . ";
        }
    }
    
    Utility::redirectPage("../door/editDelete.php?editUser=1&message={$message}");

} else {
    Utility::redirectPage("../door/editDelete.php?editUser=0");
}
?>
