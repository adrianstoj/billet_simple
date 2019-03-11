<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 11/03/19
 * Time: 11:53
 */
require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/layout.php'; ?>
    <div id="home_image"></div>
    <h2>EDITER CHAPITRE</h2>
    <ul>
        <?php
        foreach ($data[0] as $chapter) {
            echo ('<li>'. $chapter->getTitle(). '<a href="/admin/editer-chapitre-'. $chapter->getId(). '"></br><button class="btn btn-primary">Modifier</button></a></li></br><form action="/admin/supprimer-chapitre-'. $chapter->getId().'" method="post"><button class="btn btn-danger" type="submit" name="delete">Supprimer</button></form>');
        }
        ?>
    </ul>

<?php require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/footer.php'; ?>