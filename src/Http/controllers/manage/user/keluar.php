<?php

use App\Core\App;
use App\Core\Database;

$db = App::resolve(Database::class);

$user = $db->query("SELECT * FROM `users` WHERE `id` = :id", [
    'id' => $_POST['id']
])->findOrFail();

$db->query("UPDATE `users` SET `is_out` = :is_out WHERE `id` = :id", [
    'is_out' => 1,
    'id' => $_POST['id']
]);

return redirect('/manage/user');