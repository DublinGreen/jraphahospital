<?php

require_once '../../MODELS/initialize.php';
$login = new MySql();

$value1 = $login->escapeValues($_POST['email']);
$value2 = $login->escapeValues($_POST['password']);

if (!isset($value1) && !isset($value2)) {
    Utility::redirectPage("../door/index.php");
} else {
    $hashPassword = Utility::hashpassword($value2);
    if ($query = $login->query("SELECT id , email , time_created FROM users 
        WHERE email = '{$value1}' AND password = '{$hashPassword }' LIMIT 1")) {
            
        while ($result = $login->fetch($query)) {
            $_SESSION['userId'] = $result['id'];
            $_SESSION['userEmail'] = $result['email'];
            $_SESSION['userTimeCreated'] = $result['time_created'];
        }
        
        $count = $login->numRows($query);
        if($count == 1 && isset($_SESSION['userId'])){
             Utility::redirectPage("../door/dashboard.php");
        }else{
            Utility::redirectPage("../door/index.php?login=0");
        }
        
    }

}
?>
