<?php

use App\Core\App;
use App\Core\Database;
use Rakit\Validation\Validator;

$validator = new Validator();
$db = App::resolve(Database::class);

$user = $db->query("SELECT * FROM `users` WHERE `id` = :id", [
    'id' => $_POST['id']
])->findOrFail();

$rules = [
    'fullname' => 'required',
    'username' => 'required|alpha_dash|lowercase',
    'email' => 'required|email',
    'dob' => 'required',
];

if (!empty($_POST['password'])) {
    $rules = array_merge($rules, [
        'password' => 'required|min:6',
        'confirm_password' => 'required|same:password',
    ]);
}

$validation = $validator->validate($_POST, $rules);

if ($validation->fails()) {
    return view('manage/user/edit.view.php', [
        'errors' => $validation->errors()->all(),
        'user' => $user
    ]);
}

$query = 'UPDATE `users` SET `fullname` = :fullname, `username` = :username, `email` = :email, `address` = :address, `dob` = :dob, `status` = :status, `updated_at` = :updated_at WHERE `id` = :id';
$params = [
    'id' => $_POST['id'],
    'fullname' => $_POST['fullname'],
    'username' => $_POST['username'],
    'email' => $_POST['email'],
    'address' => $_POST['address'],
    'dob' => $_POST['dob'],
    'status' => $_POST['status'] ?? 0,
    'updated_at' => date('Y-m-d H:i:s'),
];

if (!empty($_POST['password'])) {
    $query = 'UPDATE `users` SET `fullname` = :fullname, `username` = :username, `email` = :email, `password` = :password, `address` = :address, `dob` = :dob, `status` = :status, `updated_at` = :updated_at WHERE `id` = :id';

    $params = array_merge($params, [
        'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
    ]);
}

$db->query($query, $params);

return redirect('/manage/user');
