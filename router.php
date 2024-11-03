<?php 
require_once realpath( __DIR__ . '/config/config.php');
require_once realpath( __DIR__ . '/app/Models/taskModel.php');
require_once realpath( __DIR__ . '/app/Controllers/taskController.php');

$db = new SQLite3(DB_PATH);
$taskModel = new TaskModel($db);
$taskController = new TaskController($taskModel);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'delete':
                $taskController->deleteTask($_POST['taskId']);
                break;
            case 'update':
                $taskController->updateForm($_POST['taskId']);
                break;
            case 'updateCheck':
                $taskController->updateCheckForm($_POST['taskId'], $_POST['completedCheckBox']);
                break;
            case 'add':
                $taskController->addForm();
                break;
            default:
                $taskController->index();
                break;
        }
    }
} else {
    $taskController->index();
}
?>