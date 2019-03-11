<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 26/01/19
 * Time: 12:14
 */
require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/layout.php'; ?>
<div id="home_image"></div>
<h2>CHAPITRE <?php echo $data[0]; ?></h2>
<p><?php echo $data[1]; ?></p>

<h3>COMMENTAIRES</h3>
<ul id="commentsList">
    <?php
    foreach ($data[2] as $comment) {
        $commentDate = $comment->getCommentDate();
        $commentId = $comment->getId();
        $chapterNb = $comment->getChapterId();
        $chapterId = $data[3];
        $date = explode(' ', $commentDate);
        echo ('<li><b>'. $comment->getAuthor(). '</b> le '. $date[0]. ' à '. $date[1]. '</br>'. $comment->getContent().
            '<form action="/signalement/commentaire-'. $commentId. '" method="post">
                <button class="btn btn-danger" type="submit" name="report" value="'. $commentId. ' '. $chapterNb. ' '. $chapterId. '">Signaler</button>
            </form>'. '</li></br>');
    }
    ?>
</ul>
<form action="/ajoutCommentaire/chapitre-<?php echo $data[0]; ?>-<?php echo $data[3]; ?>" method="post">
    <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <input type="text" class="form-control" id="formName" placeholder="Votre pseudo" name="author">
    </div>
    <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" class="form-control" id="forTitle" placeholder="Titre (optionnel)" name="title">
    </div>
    <div class="form-group">
        <label for="content">Commentaire</label>
        <textarea class="form-control" id="formComment" rows="3" placeholder="Votre commentaire" name="content"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

<?php require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/footer.php'; ?>