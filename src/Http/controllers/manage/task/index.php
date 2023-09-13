<?php

use App\Core\App;
use App\Core\Database;

$db = App::resolve(Database::class);

$tasks = $db->query("SELECT `t`.*, `u`.`fullname` AS `user` FROM `tasks` AS `t` JOIN `users` AS `u` ON `t`.`user_id`=`u`.`id` WHERE `t`.`deleted_at` IS NULL")
    ->get();

return view('manage/task/index.view.php', [
    'tasks' => $tasks
]);