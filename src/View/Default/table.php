<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 26/01/19
 * Time: 12:14
 */
session_start();
$pageTitle = 'Table du roman Billet Simple pour l\'Alaska';
require '/kunden/homepages/26/d731598736/htdocs/billet_simple/src/View/Layout/layout.php'; ?>

<div class="header-img"></div>
<h2 class="header-title">Chapitres</h2>
<ul id="table-ul">
    <?php
    foreach ($data[0] as $chapter) {
        echo ('<a href="'. $chapter->getSlug(). '-'. $chapter->getId(). '"><li>'. $chapter->getTitle(). '</li></a>');

    }
    ?>
</ul>

<?php require '/kunden/homepages/26/d731598736/htdocs/billet_simple/src/View/Layout/footer.php'; ?>