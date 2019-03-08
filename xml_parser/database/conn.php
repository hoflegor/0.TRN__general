<?php

$config = require_once 'config.php';

try {

    $conn = new PDO("mysql:host={$config['host']};dbname={$config['database']};charset=utf8", $config['user'], $config['password'], [
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

} catch (PDOException $error) {

    echo '<h1>Nie można połączyć z bazą <u>' . $config ['database'] . '</u></h1>';
    exit ( "<h2>" . $error->getMessage() . "</h2>");

}
