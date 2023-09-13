<?php

use App\Core\App;
use App\Core\Database;
use Rakit\Validation\Validator;

$db = App::resolve(Database::class);
$validator = new Validator();

$validation = $validator->validate($_POST, [
    'user_id' => 'required',
    'description' => 'required',
]);

if ($validation->fails()) {
    return view('manage/task/create.view.php', [
        'errors' => $validation->errors()->all()
    ]);
}

$db->query("INSERT INTO `tasks` SET `user_id` = :user_id, `description` = :description, `created_at` = :created_at", [
    'user_id' => $_POST['user_id'],
    'description' => $_POST['description'],
    'created_at' => date('Y-m-d H:i:s'),
]);

return redirect('/manage/task');