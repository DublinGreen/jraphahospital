<?php

# This is the class that will handle the session and outputbuffer
# Script by Green
# contact greendublin007@gmail.com for help

class Session {

    public function __construct() {
        ob_start();
        session_start();
    }

    public function check_visitor($redirectPage) {
        if (!isset($_SESSION['id'])) {
            Utility::redirectPage($redirectPage);
        }
    }

    public function endBuffer() {
        ob_end_flush();
    }

    public function __destruct() {
        $this->endBuffer();
    }

}

$session = new Session();
?>