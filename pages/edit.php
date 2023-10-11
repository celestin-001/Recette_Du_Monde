    <?php
    require __DIR__."/../config.php" ;
    session_start();
    require $GLOBALS['PHP_DIR']."class/Autoloader.php" ;
    Autoloader::register();
    use recipe\RecipeCreate;

    $create = new RecipeCreate();
    $create->state = false;

    /**
     * Cette page utilise la méthode generateRecette() pour editer une recette
     */
    ob_start();
        $create->generateRecette();
    $content = ob_get_clean();
    Template::render($content);