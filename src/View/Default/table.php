<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 26/01/19
 * Time: 12:14
 */
require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/layout.php';
?>

<h2>CHAPITRES</h2>
<ul>
    <?php
    foreach ($data[0] as $chapter) {
        echo ('<li>'. $chapter->getTitle(). '</li>');
    }
    ?>
</ul>
