<?php

$router->get('/', 'index.php')->only('auth');
$router->get('/about', 'about.php')->only('auth');

$router->get('/login', 'auth/login.php')->only('guest');
$router->post('/login', 'auth/do_login.php')->only('guest');
$router->delete('/logout', 'auth/logout.php')->only('auth');

// manage user
$router->get('/user', 'user/index.php')->only('auth');
$router->post('/user', 'user/store.php')->only('auth');
$router->put('/user', 'user/update.php')->only('auth');
$router->delete('/user', 'user/delete.php')->only('auth');
$router->get('/user/create', 'user/create.php')->only('auth');
$router->get('/user/edit', 'user/edit.php')->only('auth');

// manage task
$router->get('/task', 'task/index.php')->only('auth');
$router->post('/task', 'task/store.php')->only('auth');
$router->get('/task/create', 'task/create.php')->only('auth');