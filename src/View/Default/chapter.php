<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 26/01/19
 * Time: 12:14
 */
require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/layout.php';
?>
<div id="home_image"></div>
<h2>CHAPITRE <?php echo $data[0]; ?></h2>
<p><?php echo $data[1]; ?></p>

<h3>COMMENTAIRES</h3>
<ul>
    <?php
    foreach ($data[2] as $comment) {
        echo ('<li>'. $comment->getTitle(). $comment->getContent(). '</li>');
    }
    ?>
</ul>
<form action="" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Pseudo</label>
        <input type="text" class="form-control" id="formName" placeholder="Votre pseudo">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Commentaire</label>
        <textarea class="form-control" id="formComment" rows="3" placeholder="Votre commentaire"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>

</form>