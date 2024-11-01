<?php 

class GetTaskController {
    private $getTaskModel;

    public function __construct($model) {
        $this->getTaskModel = $model;
    }

    public function index() {
        $rows = $this->getTaskModel->getAllTask();
        include realpath(__DIR__ . '/../Views/getTaskView.php');
    }
}

?>