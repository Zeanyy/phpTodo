<?php 

if (file_exists(realpath(__DIR__ . '/../config/config.php'))) {
    require_once realpath(__DIR__ . '/../config/config.php');
} else {
    die('Plik config.php nie istnieje.');
}

if (!file_exists(DB_NAME)) {
    die("Plik bazy danych nie istnieje: " . DB_NAME);
}

try {
    $DB = new SQLite3(DB_NAME);
} catch(Exception $e) {
    die("Błąd połączenia z bazą danych: " . $e->getMessage());
}

$result = $DB->query("SELECT * FROM tasks");

while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    echo $row["task"];
}

?>