<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 11/03/19
 * Time: 12:03
 */
session_start();
if (!isset($_SESSION['login']) AND !isset($_SESSION['role']))
{
    header("HTTP/1.1 403 Unauthorized" );
    exit;
}
elseif (isset($_SESSION['login']) AND isset($_SESSION['role']) AND !isset($_SESSION['role'])) {
    header("HTTP/1.1 403 Unauthorized" );
    exit;
}
require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/layout.php'; ?>
<!--    <div id="home_image"></div>-->
<!--    <h2>EDITER CHAPITRE</h2>-->
    <form action="/admin/editer-chapitre-<?php echo $data[0]->getId(); ?>" method="post">
        <input type="number" class="form-control" id="formSlug" placeholder="Numéro du chapitre" name="number" value="<?php echo ($data[0]->getNumber()) ?>" >
        <input type="text" class="form-control" id="formChapter" placeholder="Titre du chapitre" name="title" value="<?php echo ($data[0]->getTitle()) ?>">
        <textarea name="content" class="adminarea""><?php echo ($data[0]->getContent()) ?></textarea>
        <button type="submit" class="btn btn-primary">Editer</button>
    </form>

<?php require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/footer.php'; ?>