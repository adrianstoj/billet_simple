<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 11/03/19
 * Time: 18:39
 */
require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/layout.php'; ?>
<div id="home_image"></div>
<h2>EDITER COMMENTAIRES</h2>
<ul>
    <?php
    foreach ($data[0] as $comment) {
        echo ('<li>'. $comment->getTitle(). ' '.$comment->getContent(). ' '.$comment->getChapterId().'</li>');
    }
    ?>
</ul>

<?php require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/footer.php'; ?>