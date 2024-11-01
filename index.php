<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        
        h1 {
            text-align: center;
            color: #444;
        }

        table {
            width: 100%;
            max-width: 1200px;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 20px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #0073e6;
            color: #fff;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e3f2fd;
        }

        td:first-child {
            font-weight: bold;
            color: #0073e6;
        }
    </style>
</head>
<body>
    <?php
        require_once realpath( __DIR__ . '/config/config.php');
        require_once realpath( __DIR__ . '/app/Models/taskModel.php');
        require_once realpath( __DIR__ . '/app/Controllers/taskController.php');
    
        $db = new SQLite3(DB_PATH);
        $taskModel = new TaskModel($db);
        $taskController = new TaskController($taskModel);

        if(isset($_POST['addTaskButton']) || isset($_POST['addData'])) {
            $taskController->addForm();
        } else {
            $taskController->index();
        }
    ?>
</body>
</html>