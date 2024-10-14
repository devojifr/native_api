<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/constants.php';
require_once __DIR__ . '/../config/database.php';

use Dotenv\Dotenv;

# Loaded from environment variable
date_default_timezone_set($_SERVER['TZ']);

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();