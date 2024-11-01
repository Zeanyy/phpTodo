<?php 

class TaskController {
    private $taskModel;

    public function __construct($model) {
        $this->taskModel = $model;
    }

    public function index() {
        $rows = $this->taskModel->getAllTasks();
        include realpath(__DIR__ . '/../Views/taskView.php');
    }

    public function addForm() {
        if(isset($_POST['addData'])) {
            $rows = $this->taskModel->addTask($_POST['description'], $_POST['deadline'], $_POST['priority']);
            header('Location: index.php');
        }
        include realpath(__DIR__ . '/../Views/addView.php');
    }
}

?>