<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <h1>
        <?php
            require_once realpath( __DIR__ . '/config/config.php');
            require_once realpath( __DIR__ . '/app/Models/getTaskModel.php');
            require_once realpath( __DIR__ . '/app/Controllers/getTaskController.php');
        
            $db = new SQLite3(DB_PATH);
            $getTaskModel = new GetTaskModel($db);
            $getTaskController = new GetTaskController($getTaskModel);

            $getTaskController->index();
        ?>
    </h1>
</body>
</html>