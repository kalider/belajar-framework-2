<?php

use App\Core\App;
use App\Core\Database;

$db = App::resolve(Database::class);

$db->query('INSERT INTO `users` (`fullname`, `username`, `email`, `password`, `address`, `dob`, `status`, `created_at`) VALUES (:fullname, :username, :email, :password, :address, :dob, :status, :created_at)', [
    'fullname' => $_POST['fullname'],
    'username' => $_POST['username'],
    'email' => $_POST['email'],
    'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
    'address' => $_POST['address'],
    'dob' => $_POST['dob'],
    'status' => $_POST['status'] ?? 0,
    'created_at' => date('Y-m-d H:i:s'),
]);

return redirect('/user');
