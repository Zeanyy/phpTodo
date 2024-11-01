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
            $this->taskModel->addTask($_POST['description'], $_POST['deadline'], $_POST['priority']);
            header('Location: index.php');
        }
        include realpath(__DIR__ . '/../Views/addView.php');
    }

    public function updateForm($id) {
        $row = $this->taskModel->getSingleTask($id);
        if (isset($_POST['updateData'])) {
            $this->taskModel->updateTask($id, $_POST['newDescription'], $_POST['newDeadline'], $_POST['newPriority']);
            header('Location: index.php');
        }
        include realpath(__DIR__ . '/../Views/updateView.php');
    }

    public function deleteTask($id) {
        $this->taskModel->deleteTask($id);
        header('Location: index.php');
    }
}

?>