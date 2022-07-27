<?php

class Pagination {

    public $perPage;
    public $currentPage = 2;
    public $totalCount;
    //per_page * current_page - 1
// $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

    private $sql = "SELECT COUNT(*) AS countAll FROM all_nominees ";

    public function __construct($page = 1, $perPage = 7) {
        $this->totalCount = (int)$this->countAll();
        $this->currentPage = (int) $page;
        $this->perPage = (int) $perPage;
    }

    public function offset() {
        return ($this->currentPage - 1) * $this->perPage;
    }

    public function totalPages() {
        return ceil($this->totalCount / $this->perPage);
    }

    public function prev() {
        return $this->currentPage - 1;
    }

    public function next() {
        return $this->currentPage - 1;
    }

    public function hasPrev() {
        return $this->prev() >= 1 ? TRUE : FALSE;
    }

    public function hasNext() {
        return $this->next() <= $this->totalPages() ? TRUE : FALSE;
    }

    public function countAll() {
        if ($query = mysql_query($this->sql)) {
            while ($row = mysql_fetch_array($query)) {
                return $row['countAll'];
            }
        } else {
            return FALSE;
        }
    }

    public function __destruct() {
        
    }

}

?>