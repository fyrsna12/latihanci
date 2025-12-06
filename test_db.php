<?php
echo "PHP Version: " . phpversion() . "\n";

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'latihanci_fix';

$mysqli = new mysqli($hostname, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
echo "Connected successfully to database: " . $database;
$mysqli->close();
?>
