<?php
// ==========================
// Front Controller
// ==========================

// Dev mode (disable in production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// ==========================
// PSR-4 Autoload
// ==========================
spl_autoload_register(function ($class) {
    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// ==========================
// Simple Routing
// ==========================
$controllerName = $_GET['controller'] ?? 'home';
$actionName     = $_GET['action'] ?? 'index';

$controllerClass = 'Controller\\' . ucfirst($controllerName) . 'Controller';

// ==========================
// Controller check
// ==========================
if (!class_exists($controllerClass)) {
    http_response_code(404);
    require_once __DIR__ . '/View/error/404.php';
    exit;
}

$controller = new $controllerClass();

// ==========================
// Action check
// ==========================
if (!method_exists($controller, $actionName)) {
    http_response_code(404);
    require_once __DIR__ . '/View/error/404.php';
    exit;
}

// ==========================
// Call action
// ==========================
$controller->$actionName();
