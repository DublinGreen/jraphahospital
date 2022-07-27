<?php require_once 'ImpleMySql.php'; ?>
<?php

# This is the MySql class extends Database and implements ImplMySql
# Script by Green
# contact greendublin007@gmail.com for help
# Updated 01/12/2013

class MySql extends Database implements ImplMySql {

    private static $databaseType = "jrapha";
    private $lastQuery;
    private $databaseError;
    

    public function __construct() {
        parent::__construct();
    }

    public function query($sql) {
        $this->lastQuery = $sql;
        return parent::db_query($sql);
    }

    public function fetch($query) {
        return parent::db_fetch($query);
    }
    
    public function queryAndFetch($sql){
        $this->lastQuery = $sql;
        $resultSet;
        
        if($query = parent::db_query($sql)){
            while ($row = parent::db_fetch($query)) {
                $resultSet = $row;
            }
        }else{
            exit($this->getdatabaseError());
        }
        return $resultSet;
    }

    public function escapeValues($value) {
        return mysqli_real_escape_string($value);
    }

    public function numRows($query) {
        if ($query) {
            return mysqli_num_rows($query);
        } else {
            $this->databaseError = mysqli_error();
        }
    }

    public function insertedId() {
        return mysqli_insert_id($this->connection);
    }

    public function affected_rows() {
        return mysqli_affected_rows();
    }

    public function getdatabaseError() {
        return parent::getdatabaseError();
    }


    public function __destruct() {
    }

}

$mysql = new MySql();
$db = & $mysql;
?>