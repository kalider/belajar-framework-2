<?php

namespace App\Middleware;

use App\Core\App;
use App\Core\Database;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Authenticated
{
    public function handle()
    {
        if (!$_COOKIE['X-SESSION-APP'] ?? false) {
            header('location: /manage/login');
            exit();
        }

        $db = App::resolve(Database::class);
        $conf = require base_path('config.php');
        try {
            JWT::decode($_COOKIE['X-SESSION-APP'], new Key($conf['jwt']['key'], 'HS256'));
        } catch (\Exception $e) {
            $token = $_COOKIE['X-SESSION-APP'];
            setcookie('X-SESSION-APP', '', 1, '/');
            
            $db->query('DELETE FROM `sessions` WHERE `token` = :token', [
                'token' => $token
            ]);

            header('location: /manage/login');
            exit();
        }
    }
}