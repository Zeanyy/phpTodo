<?php

class GetTaskModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllTask() {
        $result = $this->db->query("SELECT * FROM tasks");
        $allRows = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $allRows[] = $row;
        }
        return $allRows;
    }
}

?>