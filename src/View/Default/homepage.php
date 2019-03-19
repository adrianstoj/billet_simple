<?php
session_start();
$pageTitle = 'Billet simple pour l\'Alaska premier opus numérique par Jean Forteroche';
require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/layout.php' ?>

<!--<div id="home_image"></div>-->
<div id="homepage-img"></div>
<h1 id="home-h1">BILLET SIMPLE POUR L'ALASKA</h1>
<h2 id="home-h2">PREMIER OPUS DE LA SERIE</h2>
<h3 id="home-h3">PAR JEAN FORTEROCHE</h3>
<a href="#home-container-intro"><button id="home-btn">LIRE</button></a>
<a href="#home-container-intro"><i id="home-down" class="glyphicon glyphicon-chevron-down"></i></a>

<div id="home-container-intro">
    <h4 id="home-h4">À mon ami Lorem Ipsum,</h4>
    <p id="home-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in dui molestie, volutpat nulla at, varius nulla. Etiam nec iaculis elit. Nunc pulvinar, enim vel tempus condimentum, velit enim laoreet lectus, et mattis lectus urna eget felis. Curabitur id est venenatis, maximus sapien eu, accumsan eros. Donec sed efficitur nisi. Ut ipsum sem, rhoncus at consequat id, scelerisque quis sapien. Integer tempus libero consequat felis fringilla feugiat.
    </br></br>
    Sed quis velit vel lectus efficitur lacinia eget hendrerit risus. Vivamus at pharetra massa, id lobortis tortor. Suspendisse sit amet arcu eget augue consectetur porta at ut dolor. Ut mollis odio id varius ornare. Mauris feugiat luctus ligula quis cursus. Etiam vel ex a libero tincidunt blandit a id orci. Vivamus sit amet blandit eros. In sed nibh eu orci vestibulum blandit non vitae tellus. Vestibulum blandit volutpat purus nec sollicitudin. Fusce ut urna lectus. Morbi volutpat a risus in volutpat. Ut dignissim, leo vitae fringilla egestas, odio massa posuere ante, vel egestas eros felis at dolor. Ut sed tellus magna. Duis mattis dolor in nulla imperdiet malesuada.</p>
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

<?php require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/footer.php'; ?>
