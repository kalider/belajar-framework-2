<?php

use App\Core\App;
use App\Core\Database;

$db = App::resolve(Database::class);

$user = $db->query("SELECT * FROM `users` WHERE `id` = :id", [
    'id' => $_POST['id']
])->findOrFail();

$db->query("UPDATE `users` SET `deleted_at` = :deleted_at WHERE `id` = :id", [
    'deleted_at' => date('Y-m-d H:i:s'),
    'id' => $_POST['id']
]);

return redirect('/manage/user');