<?php
$dsn = 'mysql:host=localhost;dbname=todolist';
$username = 'root';
//$password = '1qaz2WSX';

try {
    $db = new PDO($dsn, $username);
} catch (PDOException $e) {
    $error = "Database Error: ";
    $error .= $e->getMessage();
    include('view/error.php');
    exit();
}