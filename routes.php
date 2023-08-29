<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');

// manage user
$router->get('/user', 'user/index.php');
$router->post('/user', 'user/store.php');
$router->put('/user', 'user/update.php');
$router->get('/user/create', 'user/create.php');
$router->get('/user/edit', 'user/edit.php');
