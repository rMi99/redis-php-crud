<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once __DIR__ . '/../src/controllers/RedisController.php';

$controller = new RedisController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_GET['action'] ?? '';
    $key = $_POST['key'] ?? '';
    $value = $_POST['value'] ?? '';
    $expiration = $_POST['expiration'] ?? 0;

    switch ($action) {
        case 'create':
            $controller->create($key, $value, $expiration);
            break;
        case 'read':
            echo $controller->read($key);
            break;
        case 'update':
            $controller->update($key, $value, $expiration);
            break;
        case 'delete':
            $controller->delete($key);
            break;
    }
}

include __DIR__ . '/../src/views/index.php';
