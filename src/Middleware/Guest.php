<?php

namespace App\Middleware;

class Guest
{
    public function handle()
    {
        if ($_COOKIE['X-SESSION-APP'] ?? false) {
            header('location: /');
            exit();
        }
    }
}