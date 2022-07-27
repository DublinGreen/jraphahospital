<?php

# This is the interface ImplDatabase
# Script by Green
# contact greendublin007@gmail.com for help
# Updated 01/12/2013

interface ImplDatabase {

    public function getdatabaseError();

    public function open_connection();

    public function query($sql);

    public function fetch($query);

    public function close_connection();
}
?>

