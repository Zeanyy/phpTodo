<?php

class TaskModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function addTask($desc, $deadline, $priority) {
        $query = "INSERT INTO tasks ('description', 'deadline_date', 'priority') VALUES (:desc, :deadline, :priority)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':desc', $desc, SQLITE3_TEXT);
        $stmt->bindValue(':deadline', $deadline, SQLITE3_TEXT);
        $stmt->bindValue(':priority', $priority, SQLITE3_INTEGER);
        $stmt->execute();
    }

    public function getAllTasks() {
        $query = "SELECT * FROM tasks";
        $result = $this->db->query($query);
        $allRows = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $allRows[] = $row;
        }
        return $allRows;
    }

    public function getSingleTask($id) {
        $query = "SELECT * FROM tasks WHERE task_id = $id";
        $result = $this->db->query($query);
        return $result->fetchArray(SQLITE3_ASSOC);
    }

    public function updateTask($id, $desc, $deadline, $priority) {
        $query = "UPDATE tasks SET 'description' = :desc, 'deadline_date' = :deadline, 'priority' = :priority WHERE task_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':desc', $desc, SQLITE3_TEXT);
        $stmt->bindValue(':deadline', $deadline, SQLITE3_TEXT);
        $stmt->bindValue(':priority', $priority, SQLITE3_INTEGER);
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();
    }

    public function updateCheck($id) {
        $query = "UPDATE tasks SET 'description' = :desc, 'deadline_date' = :deadline, 'priority' = :priority WHERE task_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();
    }

    public function deleteTask($id) {
        $query = "DELETE FROM tasks WHERE task_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();
    }

}

?>


<!-- CREATE TABLE tasks (
    task_id INTEGER PRIMARY KEY AUTOINCREMENT,
    description TEXT NOT NULL,
    creation_date DATE DEFAULT (DATE('now')),
    deadline_date DATE,
    priority INTEGER CHECK(priority BETWEEN 1 AND 5),
    completed BOOLEAN DEFAULT 0
); -->