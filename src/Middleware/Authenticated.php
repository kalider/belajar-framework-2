<?php

namespace App\Middleware;

class Authenticated
{
    public function handle()
    {
        if (!$_COOKIE['X-SESSION-APP'] ?? false) {
            header('location: /login');
            exit();
        }
    }
}