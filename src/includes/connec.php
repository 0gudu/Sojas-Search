<?php
define('ROOT_DIR', dirname(__DIR__));
require_once ROOT_DIR . '../../config/configdb.php';


try {
    $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Caught exception: ' . $e->getMessage();
}

?>
