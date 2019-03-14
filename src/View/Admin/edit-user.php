<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 13/03/19
 * Time: 12:08
 */
require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/session.php';
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
<h2>EDITER UTILISATEUR</h2>
<h3>Créer un nouvel utilisateur</h3>
<div id="formContent">
    <form action="/nouvel-utilisateur" method="post">
        <input type="text" id="login" class="fadeIn second" name="login" placeholder="login" required>
        <input type="text" id="password" class="fadeIn third" name="password" placeholder="password" required>
        <input type="number" id="role" class="fadeIn third" name="role" placeholder="role" required>
        <input type="submit" class="btn btn-primary" value="Créer">
    </form>
</div>
<h3>Liste des utilisateurs</h3>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Pseudonyme</th>
            <th scope="col">Role</th>
            <th scope="col">Modifier</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($data[0] as $user) {
            if ($user->getRoleId() == 1) { $role = 'Admin'; }
            elseif ($user->getRoleId() == 2) { $role = 'Auteur'; }
            elseif ($user->getRoleId() == 3) { $role = 'Modérateur'; }
            echo ('<tr>'.
                '<th scope="row">'. $user->getId().'</th>'.
                '<th scope="row">'. $user->getLogin().'</th>'.
                '<th scope="row">'. $role. '</th>'.
                '<td><button class="btn btn-primary">Modifier</button><form action="/admin/supprimer-utilisateur-'. $user->getId().'" method="post"><button class="btn btn-danger" type="submit" name="delete" value="'. $user->getId().'">Supprimer</button></form></td>'.
                '</tr>');
        }
//        ?>
        </tbody>
    </table>
<?php require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/footer.php'; ?>


