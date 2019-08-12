<?php
include_once 'dao.php';

class App
{
    protected $dao;

    function __construct()
    {
        $this->dao = new Dao();
    }

    function getDao()
    {
        return $this->dao;
    }

    /**
     * Function that saves username into $SESSION variable when user signin (signin.php)
     */
    function init_session($user)
    {
        if (!isset($_SESSION['user'])) {
            $_SESSION['user'] = $user;
        }
    }

    function invalidate_session()
    {
        if (isset($_SESSION['user'])) {
            unset ($_SESSION['user']);
        }
        session_destroy();
        $this->showLogin();
    }

    function showSignIn()
    {
        header('Location: ../htmldocs/signin_page.html');
    }

    function isLogged()
    {
        return isset($_SESSION['user']);
    }

    function validateSession()
    {
        session_start();
        if (!$this->isLogged()) {
            $this->showSignIn();
        }
    }
}