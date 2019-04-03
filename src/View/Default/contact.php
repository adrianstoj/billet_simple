<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 26/01/19
 * Time: 12:14
 */
session_start();
$pageTitle = 'Contactez Jean Forteroche';
require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/layout.php'; ?>
<?php if(isset($_SESSION['success'])) { ?>
    <div class="alert alert-success" role="alert">
        <?php echo($_SESSION['success']);
        unset($_SESSION['success']);?>
    </div>
<?php } ?>
    <div id="login-img"></div>
    <div id="wrapper-contact">
        <div id="formContact">
            <h2 id="title-contact">Contactez-moi</h2>
            <form action="/postMail" method="post">
                <input type="email" id="login" name="email" placeholder="Votre mail" required>
                <textarea class="form-control" id="formComment" rows="3" placeholder="Votre message" name="content" required></textarea>
                <input type="submit" id="login-btn" value="Envoyer">
            </form>
        </div>
    </div>

<?php require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/footer.php'; ?>