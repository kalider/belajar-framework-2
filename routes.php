<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');

$router->get('/manage', 'manage/index.php')->only('auth');
$router->get('/manage/login', 'manage/auth/login.php')->only('guest');
$router->post('/manage/login', 'manage/auth/do_login.php')->only('guest');
$router->delete('/manage/logout', 'manage/auth/logout.php')->only('auth');

// manage user
$router->get('/manage/user', 'manage/user/index.php')->only('auth');
$router->post('/manage/user', 'manage/user/store.php')->only('auth');
$router->put('/manage/user', 'manage/user/update.php')->only('auth');
$router->delete('/manage/user', 'manage/user/delete.php')->only('auth');
$router->get('/manage/user/create', 'manage/user/create.php')->only('auth');
$router->get('/manage/user/edit', 'manage/user/edit.php')->only('auth');

// manage task
$router->get('/manage/task', 'manage/task/index.php')->only('auth');
$router->post('/manage/task', 'manage/task/store.php')->only('auth');
$router->get('/manage/task/create', 'manage/task/create.php')->only('auth');