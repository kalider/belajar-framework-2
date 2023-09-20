<?php

use App\Core\App;
use App\Core\Database;
use App\Core\Paginator;

$db = App::resolve(Database::class);

$total = $db->query("SELECT COUNT(id) as total  FROM `users` WHERE `deleted_at` IS NULL")
    ->statement->fetchColumn();

$paginator = new Paginator($total);

$users = $db->query("SELECT * FROM `users` WHERE `deleted_at` IS NULL LIMIT {$paginator->getOffset()}, {$paginator->getLimit()}")->get();

return view('manage/user/index.view.php', [
    'users' => $users,
    'paging' => $paginator
]);