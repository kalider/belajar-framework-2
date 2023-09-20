<?php

use App\Core\App;
use App\Core\Database;
use App\Core\Paginator;

$db = App::resolve(Database::class);

$filters = form_filter([
    'fullname' => ['fullname', 'like'],
    'status' => ['status', '=']
]);

$total = $db->query("SELECT COUNT(`id`) as total  FROM `users` WHERE `deleted_at` IS NULL {$filters['where']}", $filters['params'])
    ->statement->fetchColumn();

$paginator = new Paginator($total);

$users = $db->query("SELECT * FROM `users` WHERE `deleted_at` IS NULL {$filters['where']} LIMIT {$paginator->getOffset()}, {$paginator->getLimit()}", $filters['params'])->get();

return view('manage/user/index.view.php', [
    'users' => $users,
    'paging' => $paginator,
    'filters' => $filters
]);