<?php
require __DIR__."/../config.php" ;
session_start();
require $GLOBALS['PHP_DIR']."class/Autoloader.php" ;
    Autoloader::register();
    use render\IngredientRender;

/**
 * Cette page permet de mettre à jour un ingrédient
 */
    $render = new IngredientRender();

    $idIng=$_POST['isd-ing'];
    $_SESSION["ingredient_id"] = $_POST['isd-ing'];
    ob_start();
    $render->generateIngredient();
    $content = ob_get_clean();
    Template::render($content);