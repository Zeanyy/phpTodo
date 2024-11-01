<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            max-width: 400px;
            margin: 20px auto;
        }

        div {
            max-width: 900px;
            margin: 20px auto;
        }

        form[name="form"], div {
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        form h2, div h1 {
            text-align: center;
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        form label {
            font-size: 14px;
            color: #333;
            display: block;
            margin-top: 10px;
        }

        form input[type="text"],
        form input[type="date"],
        form input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form input[type="submit"]:hover {
            background-color: #218838;
        }

        table {
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        table th,
        table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        table input[type="submit"] {
            padding: 5px 10px;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 14px;
        }

        table input[type="submit"]:not(.delete) {
            background-color: #28a745;
        }

        table input[type="submit"]:not(.delete):hover {
            background-color: #218838;
        }

        table input[type="submit"].delete {
            background-color: #dc3545;
        }

        table input[type="submit"].delete:hover {
            background-color: #c82333;
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

        if (isset($_POST['deleteTaskButton'])) {
            $taskController->deleteTask($_POST['taskId']);
        } elseif (isset($_POST['updateTaskButton']) || isset($_POST['updateData'])) {
            $taskController->updateForm($_POST['taskId']);
        } elseif (isset($_POST['addTaskButton']) || isset($_POST['addData'])) {
            $taskController->addForm();
        } else {
            $taskController->index();
        }
    ?>
</body>
</html>
