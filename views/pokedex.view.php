<?php require components("header"); ?>
<div class="main-container">
    <h1>Pokedex</h1>
    <div class="pokemon-container">
        <?php foreach ($pokemons as $pokemon) : ?>
            <a href="pokemon?id=<?= $pokemon->id ?>">
                <div class="pokemon-card">
                    <div class="number"><?= $pokemon->id ?></div>
                    <div class="title"><?= $pokemon->name ?></div>
                    <img src="<?= $pokemon->getImageUrl() ?>" alt="">
                </div>
            </a>
        <?php endforeach ?>
    </div>
</div>
<?php require components("footer"); ?>