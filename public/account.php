<?php

session_start();
require_once '../common.php';
require_once '../Flash.php';

$mode = $_GET['mode'] ?? 'login';

if ($mode === 'login') {
    require __DIR__ . '/../views/partials/_login.php'; 
} elseif ($mode === 'register') {
    require __DIR__ . '/../views/partials/_register.php'; 
} else {
    echo 'Invalid mode';
}
