<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 11/03/19
 * Time: 12:03
 */
require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/layout.php'; ?>
    <div id="home_image"></div>
    <h2>EDITER CHAPITRE</h2>
    <form action="/admin/editer-<?php echo $data[0]->getSlug(); ?>" method="post">
        <input type="text" class="form-control" id="formChapter" placeholder="Titre du chapitre" name="title" value="<?php echo ($data[0]->getTitle()) ?>">
        <textarea name="content"><?php echo ($data[0]->getContent()) ?></textarea>
        <button type="submit" class="btn btn-primary">Editer</button>
    </form>

<?php require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/footer.php'; ?>