<?php

class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function login()
    {
        $data = [
            'title' => 'Page de Connexion'
        ];



        $this->view('users/login', $data);
    }

    public function createUserSession($user)
    {
        session_start();
        $_SESSION['user_id'] = $user->id;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
    }
}
