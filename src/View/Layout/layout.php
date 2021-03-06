<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Description">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive-style.css">
    <link rel="icon" type="image/x-icon" href="../images/book-icon.png">
    <title><?php echo ($pageTitle); ?></title>
</head>
<body>
    <header>
        <a class="menu-toggle rounded" href="#">
            <i class="fas fa-bars fa-2x"></i>
        </a>
        <nav id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-nav-item">
                    <a class="js-scroll-trigger" id="fix-nav-home" href="/"><i class="fas fa-home"></i>Accueil</a>
                </li>
                <li class="sidebar-nav-item">
                    <a class="js-scroll-trigger" id="fix-nav" href="/table"><i class="fas fa-book"></i>Table</a>
                </li>
                <li class="sidebar-nav-item">
                    <a class="js-scroll-trigger" id="fix-nav-second" href="/contact"><i class="fas fa-envelope"></i>Contact</a>
                </li>
                <?php if(!isset($_SESSION['login']) AND !isset($_SESSION['role'])){ ?>
                <li class="sidebar-nav-item">
                    <a class="js-scroll-trigger" id="fix-nav-third" href="/connexion"><i class="fas fa-user"></i>Connexion</a>
                </li>
                <?php }else{ ?>
                <?php if(isset($_SESSION['login']) AND isset($_SESSION['role']) AND ($_SESSION['role']) == 1 OR
                        isset($_SESSION['login']) AND isset($_SESSION['role']) AND ($_SESSION['role']) == 2) { ?>
                <li class="sidebar-nav-item">
                    <a class="js-scroll-trigger"href="/admin"><i class="fas fa-user"></i>Admin</a>
                </li>
                <?php } ?>
                <li class="sidebar-nav-item">
                    <a class="js-scroll-trigger" href="/deconnexion">Déconnexion</a>
                </li>
                <?php } ?>

            </ul>
        </nav>
        <?php
        if (isset($_SESSION['login']) AND isset($_SESSION['role']) AND $_SESSION['role'] == 1 OR
            isset($_SESSION['login']) AND isset($_SESSION['role']) AND $_SESSION['role'] == 2)
        {
            if ($_SESSION['role'] == 1) {
                $role = 'Admin';
            }
            elseif ($_SESSION['role'] == 2) {
                $role = 'Auteur';
            }
            echo '<div class="admin-header"><p class="admin-info">Bonjour<b> '. $_SESSION['login']. ' </b>vous êtes connecté en tant que '. $role. '</p><a href="/admin">Panel d\'administration</a> <a href="/deconnexion" id="header-disconnect">Déconnexion</a></div>';
        }
        ?>
    </header>

