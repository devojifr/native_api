<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/constants.php';
require_once __DIR__ . '/../config/database.php';

# Loaded from environment variable
date_default_timezone_set($_SERVER['TZ']);