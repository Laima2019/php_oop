<?php


namespace Core;


class Session
{
    private $model;
    private $user;

    public function __construct()
    {
        session_start();
        $this->loginFromCookies();
    }

    /** su sia funkcija patikriname ar useris, kuris atejo i index.php anksciau buvo prisijunges
     * @return mixed
     */
    public function loginFromCookies()
    {
        if (!empty($_SESSION)) {
            $this->login($_SESSION['email'], $_SESSION['password']);
        }
    }

    public function login($email, $password)
    {
        $model = new\App\Users\Model();
        $users = $model->get([
            'email' => $email,
            'password' => $password
        ]);

        if (!empty($users)) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $this->user = $users[0];

            return true;
        }

        return false;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function userLoggedIn()
    {
    }

    public function logout()
    {

    }
}