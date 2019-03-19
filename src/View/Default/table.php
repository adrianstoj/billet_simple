<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 26/01/19
 * Time: 12:14
 */
session_start();
$pageTitle = 'Table du roman Billet Simple pour l\'Alaska';
require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/layout.php'; ?>

<div class="header-img"></div>
<h2 class="header-title">Chapitres</h2>
<ul id="table-ul">
    <?php
    foreach ($data[0] as $chapter) {
        echo ('<a href="'. $chapter->getSlug(). '-'. $chapter->getId(). '"><li>'. $chapter->getTitle(). '</li></a>');

    }
    ?>
</ul>

<?php require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/footer.php'; ?>