<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 13/03/19
 * Time: 17:08
 */
session_start();
if (isset($_SESSION['login']) AND isset($_SESSION['role']) AND $_SESSION['role'] == 1)
{
    if ($_SESSION['role'] == 1) {
        $role = 'Admin';
    }
    echo '<div class="admin-header"><p class="admin-info">Bonjour '. $_SESSION['login']. ' vous êtes connecté en tant que '. $role. '</p><a href="/admin">Administration</a> <a href="/deconnexion">Déconnexion</a></div>';
}