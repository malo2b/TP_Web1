<?php

session_start();

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__.DS);

$url[0] = '';

if (isset($_GET['url'])) {
    $url = explode('/', $_GET['url']);
}

if ($url[0] === '' AND !isset($url[1])) {
    include_once ROOT.'view'.DS.'accueil.php';
}

?>