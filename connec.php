<?php

$dbname = 'bd';
$host = 'localhost';
$dbuser = 'root'; // Changed variable name to avoid conflict
$dbpass = ''; // Replace with your actual database password if any

try {
    $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Caught exception: ' . $e->getMessage();
}

?>
