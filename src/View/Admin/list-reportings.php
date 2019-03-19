<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 12/03/19
 * Time: 14:48
 */
session_start();
$pageTitle = 'Signalements';
if (!isset($_SESSION['login']) AND !isset($_SESSION['role']))
{
    header("HTTP/1.1 403 Unauthorized" );
    exit;
}
elseif (isset($_SESSION['login']) AND isset($_SESSION['role']) AND !isset($_SESSION['role'])) {
    header("HTTP/1.1 403 Unauthorized" );
    exit;
}
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
