<?php
// index.php (Front Controller)

// Affichage des erreurs (dev only)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Autoload PSR-4 simple (sans Composer)
spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $path = __DIR__ . '/' . $class . '.php';

    if (file_exists($path)) {
        require_once $path;
    }
});

// Routing simple via URL
$controller = $_GET['controller'] ?? 'home';
$action     = $_GET['action'] ?? 'index';

$controllerClass = 'Controller\\' . ucfirst($controller) . 'Controller';

if (!class_exists($controllerClass)) {
    die("Controller not found");
}

$controllerObject = new $controllerClass();

if (!method_exists($controllerObject, $action)) {
    die("Action not found");
}

$controllerObject->$action();
