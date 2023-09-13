<?php

use App\Core\App;
use App\Core\Database;

$db = App::resolve(Database::class);

$users = $db->query('SELECT * FROM `users` WHERE `status` = 1 AND `deleted_at` IS NULL')->get();

return view('manage/task/create.view.php', [
    'users' => $users
]);