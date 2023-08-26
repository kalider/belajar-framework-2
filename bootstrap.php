<?php

use App\Core\App;
use App\Core\Container;
use App\Core\Database;

$container = new Container();

$container->bind(Database::class, function() {
    $config = require base_path('config.php');

    return new Database($config['database']);
});

App::setContainer($container);