<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');

$router->get('/login', 'auth/login.php');
$router->post('/login', 'auth/do_login.php');
$router->delete('/logout', 'auth/logout.php');

// manage user
$router->get('/user', 'user/index.php');
$router->post('/user', 'user/store.php');
$router->put('/user', 'user/update.php');
$router->delete('/user', 'user/delete.php');
$router->get('/user/create', 'user/create.php');
$router->get('/user/edit', 'user/edit.php');
