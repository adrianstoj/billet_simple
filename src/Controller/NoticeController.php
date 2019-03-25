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
        $this->render('/kunden/homepages/26/d731598736/htdocs/billet_simple/src/View/Default/notice.php', [
        ]);
    }
}