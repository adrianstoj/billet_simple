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
use BilletSimple\Engine\Session\PHPSession;

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

            if ($user == null) {
                $PHPSession = new PHPSession();
                $PHPSession->set('failure', 'Attention cet utilisateur n\'existe pas.');
                header('Location: /connexion');
            }
            else {
                $isPasswordCorrect = password_verify($password, $user->getPassword());
                if ($isPasswordCorrect == false) {
                    $PHPSession = new PHPSession();
                    $PHPSession->set('failure', 'Le mot de passe ne correspond pas.');
                    header('Location: /connexion');
                }
                elseif ($isPasswordCorrect == true) {
                    session_start();
                    $PHPSession = new PHPSession();
                    $PHPSession->set('login', $login);
                    $PHPSession->set('role', $user->getRoleId());
                    $PHPSession->set('success', 'Connexion réussie.');
                    header('Location: /');
                }
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

            $PHPSession = new PHPSession();
            $PHPSession->set('success', 'Vous êtes bien déconnecté.');
            header('Location: /');
        }
    }
}