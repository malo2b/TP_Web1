<?php

session_start();

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__.DS);

## DB CONNEXION ##

$servername = "localhost";
$username = "malo";
$password = "malo";

try {
    $db = new PDO("mysql:host=$servername;dbname=TP_WEB", $username, $password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

## ROUTER ##

$url[0] = '';

if (isset($_GET['url'])) {
    $url = explode('/', $_GET['url']);
}

if ($url[0] === '' AND !isset($url[1])) {
    include_once ROOT.'view'.DS.'accueil.php';
}

?>