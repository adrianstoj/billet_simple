<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 12/03/19
 * Time: 17:27
 */
require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/session.php';
require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/layout.php'; ?>

<div class="wrapper">
    <div id="formContent">
        <form action="/verifier-utilisateur" method="post">
            <input type="text" id="login" class="fadeIn second" name="login" placeholder="login" required>
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
            <input type="submit" class="fadeIn fourth" value="Log In">
        </form>
    </div>
</div>

<?php require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/footer.php'; ?>
