<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 12/03/19
 * Time: 17:27
 */
session_start();
$pageTitle = 'Connexion';
require '/kunden/homepages/26/d731598736/htdocs/billet_simple/src/View/Layout/layout.php'; ?>

<div id="login-img">
    <?php if(isset($_SESSION['success'])) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo($_SESSION['success']);
            unset($_SESSION['success']);?>
        </div>
    <?php } ?>
    <?php if(isset($_SESSION['failure'])) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo($_SESSION['failure']);
            unset($_SESSION['failure']);?>
        </div>
    <?php } ?>
</div>
<div id="wrapper-login">
    <div id="formContent">
        <form action="/verifier-utilisateur" method="post">
            <input type="text" id="login" name="login" placeholder="Pseudo" required>
            <input type="password" id="password" name="password" placeholder="Mot de passe"" required>
            <input type="submit" id="login-btn" value="Connexion">
        </form>
    </div>
</div>


<?php require '/kunden/homepages/26/d731598736/htdocs/billet_simple/src/View/Layout/footer.php'; ?>
