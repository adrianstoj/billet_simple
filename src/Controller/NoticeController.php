<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 19/03/19
 * Time: 13:46
 */

namespace BilletSimple\Controller;


use BilletSimple\Engine\Controller;

class NoticeController extends Controller
{
    public function legalNotice()
    {
        $this->render('/home/adrian/Documents/dev/billet-simple/src/View/Default/notice.php', [
        ]);
    }
}