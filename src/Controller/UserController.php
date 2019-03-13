<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 07/03/19
 * Time: 18:47
 */

namespace BilletSimple\Controller;

use BilletSimple\Engine\Controller;
use BilletSimple\Engine\Manager\UserManager;

class UserController extends Controller
{
    public function connection()
    {
        $this->render('/home/adrian/Documents/dev/billet-simple/src/View/Default/login.php', [

        ]);
    }

    public function checkUser()
    {
        if (isset($_POST['login']) && $_POST['password'])
        {
            $login = $_POST['login'];
            $password = $_POST['password'];

            $userManager = new UserManager();
            $user = $userManager->read($login);
            $isPasswordCorrect = password_verify($password, $user->getPassword());

            if ($user == null) {
                dump('user null');
            }
            elseif ($isPasswordCorrect == false) {
                dump('mauvais mdp');
            }
            elseif ($isPasswordCorrect == true) {
                session_start();
                $_SESSION['login'] = $login;
                $_SESSION['role'] = $user->getRoleId();
                header('Location: /');
            }
        }
    }

    public function disconnect()
    {
        session_start();
        if (isset($_SESSION['login']) AND isset($_SESSION['role']))
        {
            $_SESSION = array();
            session_destroy();

            header('Location: /');
        }
    }
}