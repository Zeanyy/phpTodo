<?php 

require_once '../config/config.php';

if (!file_exists(DB_NAME)) {
    die("Plik bazy danych nie istnieje: " . DB_NAME);
}

try {
    $DB = new SQLite3(DB_NAME);
} catch(Exception $e) {
    die("Błąd połączenia z bazą danych: " . $e->getMessage());
}

?>