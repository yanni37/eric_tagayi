<?php


class Session
{
    public function __construct()
    {
        if(session_status() != PHP_SESSION_ACTIVE)
        {
            session_start();
        }
    }


    public function login()
    {
        $_SESSION['logged'] = true;
    }

    public function isLogged()
    {
        if (array_key_exists('logged', $_SESSION))
        {
            return true;
        }
        return false;
    }

    public function logout()
    {
        session_destroy();
    }

}