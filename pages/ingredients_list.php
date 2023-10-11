<?php
require __DIR__."/../config.php" ;
session_start();
    require $GLOBALS['PHP_DIR']."class/Autoloader.php" ;
    Autoloader::register();

    use recipe\RecipeDB;

    $ingredients = new RecipeDB();
    $results = $ingredients->getIngredients();

    /**
     * cette page liste les ingredients disponibles sur notre site
     * via la base de données
     */
    ob_start();?>
        <div id="return-welcom"><a href="acceuil.php"> Return Welcome Website </a></div>
        <div id="ingredients-content">
            <h1> Ingredients Dsiponible</h1>
            <?php
            foreach ($results as $ingredient): ?>
                <?= $ingredient->displayIngredients();
            endforeach;?>
        </div>

    <?php $content = ob_get_clean();
    Template::render($content); ?>