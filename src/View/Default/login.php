<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 12/03/19
 * Time: 17:27
 */
session_start();
require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/layout.php'; ?>

<div id="login-img"></div>
<div id="wrapper-login">
    <div id="formContent">
        <form action="/verifier-utilisateur" method="post">
            <input type="text" id="login" name="login" placeholder="Pseudo" required>
            <input type="password" id="password" name="password" placeholder="Mot de passe"" required>
            <input type="submit" id="login-btn" value="Connexion">
        </form>
    </div>
</div>


<?php require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/footer.php'; ?>
