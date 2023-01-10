<?php

// PDO 

$username = 'root';
$password = 'root';
$dbname = 'autolada';
$host = 'localhost';


$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8;';


return $database = new PDO($dsn, $username, $password);






















