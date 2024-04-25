<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'inline';
$mysqli = new mysqli($host, $username, $password);

if ($mysqli->connect_error) {
    die("Error: " . $mysqli->connect_error);
}

$db_exists = $mysqli->select_db($database);

if (!$db_exists) {
    die("Error: Database '$database' does not exist or is not accessible.");
}

$mysqli->select_db($database);

if ($mysqli->connect_error) {
    die("Error: " . $mysqli->connect_error);
}
