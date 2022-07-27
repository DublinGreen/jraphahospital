<?php

# This script just unset all the session and cookie and after ward redirect to the login page with a message to show the user is logged out
# Written by Green 

class Logout {

    public function __construct($returnPage = "index.php?logout=1") {
        $this->logout($returnPage);
    }

    public function logout($returnPage = "index.php?logout=1") {
        $this->checkSession();
        $this->removeCookie();
        $this->sessionDestroyer();
        Utility::redirectPage("index.php?logout=1");
    }

    public function checkSession() {
        if (isset($_SESSION)) {
            $_SESSION = array();
        }
    }

    public function removeCookie() {
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 4200, '/');
        }
    }

    public function sessionDestroyer() {
        if (isset($_SESSION)) {
            session_destroy();
        }
    }

    public function __destruct() {
        ;
    }

}

?>