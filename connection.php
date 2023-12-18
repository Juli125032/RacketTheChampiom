<?php

$server="localhost";
$db="id21686295_racket";
$username="id21686295_racket";
$password="Juli125032*";

try {
    $connection=new PDO("mysql:host=$server;dbname=$db", $username, $password);
} catch (Exception $e) {
    echo $e->getMessage();
}

?>