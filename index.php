<?php


session_start();
$_SESSION['Auth']=1;

require_once __DIR__ . '/config/_global.php';
require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/vendor/autoload.php';

try {
    \App\Core\Auth::checkAuth();
} catch (Exception $e) {
    echo $e->getMessage();
    return 0;
}

$route = explode('/',$_GET['__route']);
$controller = $route[0];
$method = $route[1];


if (true == empty($controller)) {
    $controller = 'App\\Controllers\\HelpDesk';
    $method = 'startPoint';
    }
elseif ('Login' == $controller) {
    $controller = 'App\\Controllers\\Login';
        if ($method == '') {
            $method = 'startPoint';
        }
    }
elseif ('Vkauth' == $controller) {
    $controller = 'App\\Controllers\\Vkauth';
    $method = 'startPoint';
    }
else {
    $controller = 'App\\Controllers\\' . $controller;
    }

try {
    if (false == method_exists($controller, $method)) {
        throw new Exception('<br>index:<br>Метод "'. $method. '" класса "'. $controller .'" не найден.');
    }
    $ctrl = new $controller();
    $ctrl->$method();
}
    catch (Exception $e) {
        echo $e->getMessage();
    }
