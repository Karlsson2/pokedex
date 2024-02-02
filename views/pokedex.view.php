<?php require components("header"); ?>
<div class="main-container">
    <div class="page-title">
        <h1>Pokedex</h1>
    </div>
    <div class="pokemon-container">
        <?php foreach ($pokemons as $pokemon) : ?>
            <a href="pokemon?id=<?= $pokemon->id ?>">
                <div class="pokemon-card fade-in-up-on-scroll">
                    <div class="top-card">
                        <?php if (strlen($pokemon->id) < 2) : ?>
                            <div class="number">No. 00<?= $pokemon->id ?></div>
                        <?php elseif (strlen($pokemon->id) < 3) : ?>
                            <div class="number">No. 0<?= $pokemon->id ?></div>
                        <?php else : ?>
                            <div class="number">No. <?= $pokemon->id ?></div>
                        <?php endif; ?>

                        <div class="title"><?= $pokemon->name ?></div>
                    </div>
                    <div class="bottom-card">
                        <img src="<?= $pokemon->getImageUrl() ?>" alt="">
                        <div class="types">
                            <?php foreach ($pokemon->types as $type) : ?>
                                <div class="type type-<?= $type ?>"><?= $type ?></div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </a>
        <?php endforeach ?>
    </div>
</div>

<script src="js/pokedex.js"></script>
<?php require components("footer"); ?>