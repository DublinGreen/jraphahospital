<?php

# This is the class that will handle the outputbuffer 
# Script by Green
# contact greendublin007@gmail.com for help
# Updated 01/12/2013


class OutputBuffer {

    public function __construct() {
        $this->startBuffer();
    }

    public function startBuffer() {
        ob_start();
    }

    public function endBuffer() {
        ob_end_flush();
    }

    public function __destruct() {
        $this->ob_end_flush();
    }

}

$outputBuffer = new OutputBuffer();

?>
