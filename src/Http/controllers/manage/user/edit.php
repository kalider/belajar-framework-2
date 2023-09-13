<?php

use App\Core\App;
use App\Core\Database;

$db = App::resolve(Database::class);

$user = $db->query("SELECT * FROM `users` WHERE `id` = :id", [
    'id' => $_GET['id']
])->find();

return view('manage/user/edit.view.php', [
    'user' => $user
]);