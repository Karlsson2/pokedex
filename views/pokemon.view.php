<?php require components("header"); ?>
<h1><?= $pokemon->id ?></h1>
<h1><?= $pokemon->name ?></h1>
<img src="<?= $pokemon->getImageUrl() ?>" alt="">
<?php require components("footer"); ?>