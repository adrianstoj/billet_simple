<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 13/03/19
 * Time: 12:08
 */
session_start();
$pageTitle = 'Editer utilisateur';
if (!isset($_SESSION['login']) AND !isset($_SESSION['role']))
{
    header("HTTP/1.1 403 Unauthorized" );
    exit;
}
elseif (isset($_SESSION['login']) AND isset($_SESSION['role']) AND !isset($_SESSION['role'])) {
    header("HTTP/1.1 403 Unauthorized" );
    exit;
}
require '/kunden/homepages/26/d731598736/htdocs/billet_simple/src/View/Layout/layout.php'; ?>
<div class="header-img"></div>
<h2 class="header-title">Editeur utilisateur</h2>
<?php if(isset($_SESSION['success'])) { ?>
    <div class="alert alert-success" role="alert">
        <?php echo($_SESSION['success']);
        unset($_SESSION['success']);?>
    </div>
<?php } ?>
<?php if(isset($_SESSION['failure'])) { ?>
    <div class="alert alert-danger" role="alert">
        <?php echo($_SESSION['failure']);
        unset($_SESSION['failure']);?>
    </div>
<?php } ?>
<h3>Créer un nouvel utilisateur</h3>
<div id="formContent">
    <form action="/nouvel-utilisateur" method="post">
        <input type="text" id="login" class="fadeIn second" name="login" placeholder="Pseudo" required>
        <input type="text" id="password" class="fadeIn third" name="password" placeholder="Mot de passe" required>
        Rôle : <select name="role" size="1" required>
            <option value="admin">Admin</option>
            <option value="author">Auteur</option>
            <option value="moderator">Modérateur</option>
        </select>
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
            <th scope="col">Supprimer</th>
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
                '<td><form action="/admin/supprimer-utilisateur-'. $user->getId().'" method="post"><button class="btn btn-danger" type="submit" name="delete" value="'. $user->getId().'">Supprimer</button></form></td>'.
                '</tr>');
        }
//        ?>
        </tbody>
    </table>
<?php require '/kunden/homepages/26/d731598736/htdocs/billet_simple/src/View/Layout/footer.php'; ?>


