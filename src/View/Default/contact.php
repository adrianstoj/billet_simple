<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 26/01/19
 * Time: 12:14
 */
session_start();
require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/layout.php'; ?>
    <div id="login-img"></div>
    <div id="wrapper-contact">
        <div id="formContact">
            <h2 id="title-contact">Contactez-moi</h2>
            <form action="" method="post">
                <input type="email" id="login" name="login" placeholder="Votre mail" required>
                <textarea class="form-control" id="formComment" rows="3" placeholder="Votre message" name="content" required></textarea>
                <input type="submit" id="login-btn" value="Envoyer">
            </form>
        </div>
    </div>

<?php require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/footer.php'; ?>