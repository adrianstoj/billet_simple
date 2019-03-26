<?php
session_start();
$pageTitle = 'Billet simple pour l\'Alaska premier opus numérique par Jean Forteroche';
require '/kunden/homepages/26/d731598736/htdocs/billet_simple/src/View/Layout/layout.php' ?>

<?php if(isset($_SESSION['success'])) { ?>
    <div class="alert alert-success" role="alert">
        <?php echo($_SESSION['success']);
        unset($_SESSION['success']);?>
    </div>
<?php } ?>
<div id="homepage-img"></div>
<h1 id="home-h1">BILLET SIMPLE POUR L'ALASKA</h1>
<h2 id="home-h2">PREMIER OPUS DE LA SERIE</h2>
<h3 id="home-h3">PAR JEAN FORTEROCHE</h3>
<a href="#home-container-intro"><button id="home-btn">LIRE</button></a>
<a href="#home-container-intro"><i id="home-down" class="glyphicon glyphicon-chevron-down"></i></a>

<div id="home-container-intro">
    <h4 id="home-h4">À mon ami Henry,</h4>
    <p id="home-p">Les côtes derrière lesquelles s'étendent les parages explorés, pour la première fois suivant toute apparence, par le célèbre Juneau, avaient dès long-temps été reconnues, et la tradition a conservé la mémoire d'établissements fort anciens en quelques parties de ce vaste littoral qui s'étend, vis-à-vis de l'Amérique, depuis les abords de la zone torride jusqu'aux froides régions arctiques.
</div>
<div id="home-container-links">
    <h4 class="home-h4-link"><a href="/chapitre-1-1"><i class="glyphicon glyphicon-chevron-right"></i>COMMENCER LA LECTURE<i class="glyphicon glyphicon-chevron-left"></i></a></h4>
    <h4 class="home-h4-link"><a href="table"><i class="glyphicon glyphicon-chevron-right"></i>VOIR TOUS LES CHAPITRES<i class="glyphicon glyphicon-chevron-left"></i></a></h4>
</div>
<h4 id="home-h4-chapters">DERNIERS CHAPITRES</h4>
<ul id="home-list-chapters">
<?php
foreach ($data[0] as $chapter) {
    echo ('<a href="'. $chapter->getSlug(). '-'. $chapter->getId(). '"><div class="container-chapter"><li>'. $chapter->getTitle(). '</li></div></a>');
}
?>
</ul>

<?php require '/kunden/homepages/26/d731598736/htdocs/billet_simple/src/View/Layout/footer.php'; ?>
