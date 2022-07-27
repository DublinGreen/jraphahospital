<?php require_once 'config.php'; ?>
<?php

# This is the Database class and implements ImplDatabase
# Script by Green
# contact greendublin007@gmail.com for help
# Updated 01/12/2013

class Database {

    public $connection;
    private $lastQuery;
    private $databaseError;
    private $connectionClosed = false;

    protected function getdatabaseError() {
        return $this->databaseError;
    }

    public function __construct() {
        $this->open_connection();
    }

    protected function open_connection() {
        $this->connection = mysqli_connect("localhost", "jraphahospital_g", "Steeldubs0077!@#","jraphahospital");
        if (mysqli_connect_errno($this->connection)) {
            $this->databaseError = mysqli_connect_error();
            exit("Database connection failed: ");
        }
    }

    protected function db_query($sql) {
        $this->lastQuery = $sql;
        $query = mysqli_query($this->connection,$sql);
        if ($query->num_rows > 0) {
            return $query;
        } 
    }

    protected function db_fetch($query) {
        if (isset($query)) {
            //print_r(mysqli_fetch_array($query,MYSQLI_ASSOC));
            return mysqli_fetch_array($query,MYSQLI_ASSOC);
        } else {
            $this->databaseError = mysqli_error($this->$connection);
        }
    }

    protected function close_connection() {
        if (isset($this->connection)) {
            mysqli_close($this->connection);
            unset($this->connection);
            $this->connectionClosed = true;
        } else {
            $this->databaseError = mysqli_error($this->$connection);
            $this->connectionClosed = true;
        }
    }

    public function __destruct() {
        $this->close_connection();
    }

}

?>