<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 08/03/19
 * Time: 12:35
 */
require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/layout.php'; ?>
<div id="home_image"></div>
<h2>NOUVEAU CHAPITRE</h2>
<form action="publierChapitre" method="post">
    <input type="number" class="form-control" id="formSlug" placeholder="Numéro du chapitre" name="slug">
    <input type="text" class="form-control" id="formChapter" placeholder="Titre du chapitre" name="title">
    <textarea class="form-control" id="newComment" rows="3" name="content"></textarea>
    <button type="submit" class="btn btn-primary">Envoyer</button>
 </form>

<?php require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/footer.php'; ?>