<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 02/03/19
 * Time: 16:45
 */

namespace BilletSimple\Controller;

use BilletSimple\Engine\Session\PHPSession;
use BilletSimple\Engine\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $this->render('/home/adrian/Documents/dev/billet-simple/src/View/Default/contact.php', [

        ]);
    }

    public function post()
    {
        if (isset($_POST['content']) && isset($_POST['email'])) {
            $PHPSession = new PHPSession();
            $PHPSession->set('success', 'Votre message a bien été envoyé.');
            mail('adrianstoj@gmail.com','Envoi depuis la page contact', $_POST['content'], 'From : ' . $_POST['email']);
        }
        header('Location: /contact');
    }
}