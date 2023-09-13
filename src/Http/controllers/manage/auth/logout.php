<?php

use App\Core\App;
use App\Core\Database;

$db = App::resolve(Database::class);

$token = $_COOKIE['X-SESSION-APP'];
setcookie('X-SESSION-APP', '', 1, '/');

$db->query('DELETE FROM `sessions` WHERE `token` = :token', [
    'token' => $token
]);

return redirect('/manage/login');