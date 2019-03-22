<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 26/01/19
 * Time: 12:14
 */
session_start();
$pageTitle = 'Chapitre du roman Billet simple pour l\'Alaska par Jean ForteRoche';
require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/layout.php'; ?>
<div class="header-img"></div>
<h2 class="header-title-chapter"><?php echo $data[4]; ?></h2>
<?php if(isset($_SESSION['success'])) { ?>
    <div class="alert alert-success" role="alert">
        <?php echo($_SESSION['success']);
        unset($_SESSION['success']);?>
    </div>
<?php } ?>
<div class="chapter-content">
    <p><?php echo $data[1]; ?></p>
</div>
    <h3 class="h3-chapters">AJOUTER UN COMMENTAIRE</h3>
<div id="container-form-comment">
    <form action="/ajoutCommentaire/chapitre-<?php echo $data[0]; ?>-<?php echo $data[3]; ?>" method="post">
        <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input type="text" class="form-control" id="formName" placeholder="Votre pseudo" name="author" required>
        </div>
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" class="form-control" id="forTitle" placeholder="Titre (optionnel)" name="title">
        </div>
        <div class="form-group">
            <label for="content">Commentaire</label>
            <textarea class="form-control" id="formComment" rows="3" placeholder="Votre commentaire" name="content" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
<ul id="commentsList">
<h3 class="h3-chapters">COMMENTAIRES</h3>
    <div id="container-comments">
    <?php
    foreach ($data[2] as $comment) {
        $commentDate = $comment->getCommentDate();
        $commentId = $comment->getId();
        $chapterNb = $comment->getChapterId();
        $chapterId = $data[3];
        $date = explode(' ', $commentDate);
        echo ('<li><div class="comment-author"><b>'. $comment->getAuthor(). '</b> le '. $date[0]. ' à '. $date[1]. '</div><div class="comment-content">'. $comment->getContent(). '</div>'.
            '<form action="/signalement/commentaire-'. $commentId. '" method="post">
                <button class="btn btn-danger report-comment" type="submit" name="report" value="'. $commentId. ' '. $chapterNb. ' '. $chapterId. '">Signaler</button>
            </form>'. '</li></br>');
    }
    ?>
    </div>
</ul>
<?php require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/footer.php'; ?>