<?php 

class TaskController {
    private $taskModel;
    private $viewPath;

    public function __construct($taskModel) {
        $this->taskModel = $taskModel;
        $this->viewPath = realpath(__DIR__ . '/../Views/');
    }

    public function index() {
        $rows = $this->taskModel->getAllTasks();
        $this->render('taskView', ['rows' => $rows]);
    }

    public function addForm() {
        if(isset($_POST['addData'])) {
            $this->taskModel->addTask($_POST['description'], $_POST['deadline'], $_POST['priority']);
            header('Location: index.php');
        }
        $this->render("addView");
    }

    public function updateForm($id) {
        $row = $this->taskModel->getSingleTask($id);
        if (isset($_POST['updateData'])) {
            $this->taskModel->updateTask($id, $_POST['newDescription'], $_POST['newDeadline'], $_POST['newPriority']);
            header('Location: index.php');
        }
        $this->render('updateView', ['row' => $row]);
    }

    public function updateCheckForm($id, $completed) {
        echo ($completed) ? "asdf" : "nie";
        // $this->taskModel->updateCheck($id, $_POST['completedCheckBox']);
        // header('Location: index.php');
    }

    public function deleteTask($id) {
        $this->taskModel->deleteTask($id);
        header('Location: index.php');
    }

    private function render($view, $data = []) {
        extract($data);
        include $this->viewPath . "/{$view}.php";
    }
}

?>