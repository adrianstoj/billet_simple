<?php require '/home/adrian/Documents/dev/billet-simple/src/View/Layout/layout.php' ?>

<div id="home_image"></div>
<h1>BILLET SIMPLE POUR L'ALASKA</h1>
<h2>PREMIER OPUS DE LA SERIE</h2>
<h3>PAR JEAN FORTEROCHE</h3>

<div id="container-introduction">
    <h4>À mon ami Lorem Ipsum</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam pellentesque sapien et lectus consequat iaculis...</p>
</div>
<h4><a href="table">ACCEDER AUX CHAPITRES</a></h4>

<h4>DERNIERS CHAPITRES</h4>
<?php
foreach ($data[0] as $chapter) {
    echo ('<a href="'. $chapter->getSlug(). '"><li>'. $chapter->getTitle(). '</li></a>');
}
?>
