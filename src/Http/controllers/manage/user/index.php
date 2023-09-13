<?php

use App\Core\App;
use App\Core\Database;

$db = App::resolve(Database::class);

$users = $db->query("SELECT * FROM `users` WHERE `deleted_at` IS NULL")->get();

return view('manage/user/index.view.php', [
    'users' => $users
]);