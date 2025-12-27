<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class HomeController extends Controller
{
    public function index(): void
    {
        $users = (new User())->all();

        $this->view('home', [
            'message' => 'Professional MVC Skeleton Ready',
            'users'   => $users
        ]);
    }
}