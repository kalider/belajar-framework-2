<?php

use App\Core\Session;

ini_set('display_errors', true);

const BASE_PATH = __DIR__.'/../';

require BASE_PATH . 'vendor/autoload.php';
require BASE_PATH . 'src/Core/functions.php';
require BASE_PATH . 'bootstrap.php';

session_start();
$router = new \App\Core\Router();
require BASE_PATH . 'routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

Session::unflash();