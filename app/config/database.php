<?php
$host = 'db';
$dbname = 'native_api';
$user = 'user';
$password = 'user';

try {
    $connection = sprintf("mysql:host=%s;dbname=%s", $host, $dbname);
    $dbClient = new PDO($connection, $user, $password);
    $dbClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection error: " . $e->getMessage());
}

global $dbClient;