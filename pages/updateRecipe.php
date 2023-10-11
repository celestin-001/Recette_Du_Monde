    <?php
    require __DIR__."/../config.php" ;
    session_start();
    require $GLOBALS['PHP_DIR']."class/Autoloader.php" ;
    Autoloader::register();
    use recipe\RecipeCreate;

    /**
     * Cette page permet de mettre à jour une recette
     */
    $create = new RecipeCreate();
    $create->state = false;

    ob_start();
        $create->generateRecette();
    $content = ob_get_clean();
    Template::render($content);