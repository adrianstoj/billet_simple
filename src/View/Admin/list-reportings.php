<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 12/03/19
 * Time: 14:48
 */
require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/layout.php'; ?>
<div id="home_image"></div>
<h2>EDITER SIGNALEMENTS</h2>
<table class="table">
<thead>
<tr>
    <th scope="col">#</th>
</tr>
</thead>
<tbody>
<?php
foreach ($data[0] as $reporting) {
    echo('<tr>'.
        '<th scope="row">'. $reporting->getId().'</th>'.
        '<td><form action="/admin/supprimer-signalement-'. $reporting->getId().'" method="post"><button class="btn btn-danger" type="submit" name="comment" value="'. $data[1]. '">Supprimer</button></form></td>'.
        '</tr>');
}
?>
</tbody>
</table>


<?php require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/footer.php'; ?>
