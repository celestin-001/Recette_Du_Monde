<?php
require __DIR__."/../config.php" ;
require $GLOBALS['PHP_DIR']."class/Autoloader.php" ;
    Autoloader::register();
    use recipe\RecipeDB;

    $tags = new RecipeDB();
    $results = $tags->getTags();

    /**
     *  Cette page permet de lister les tags disponible
     */
    ob_start();?>
        <div id="return-welcom"><a href="acceuil.php"> Return Welcome Website </a></div>
        <div id="ingredients-content">
            <h1> Tags Disponilbe</h1>
            <?php
            foreach ($results as $tag): ?>
                <?= $tag->getHTML();
            endforeach;?>
        </div>

    <?php $content = ob_get_clean();
    Template::render($content); ?>