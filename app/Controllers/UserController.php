<?php
namespace App\Controllers;

use App\Core\Controller;

class UserController extends Controller
{
    public function show($id): void
    {
        echo "User ID: " . htmlspecialchars($id);
    }

    public function store(): void
    {
        echo "POST user";
    }
}