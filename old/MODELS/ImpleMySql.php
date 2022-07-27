<?php

# This is the interface ImplDatabase
# Script by Green
# contact greendublin007@gmail.com for help
# Updated 01/12/2013

Interface ImplMySql {

    public function escapeValues($value);

    public function numRows($resultSet);

    public function insertedId();

    public function affected_rows();
}
?>
