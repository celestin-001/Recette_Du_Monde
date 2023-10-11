<?php
require __DIR__."/../config.php" ;
session_start();
require $GLOBALS['PHP_DIR']."class/Autoloader.php" ;
    Autoloader::register();
    use render\TagRender;

/**
 * Cette page permet de mettre à jour un tag
 */
    $render = new TagRender();

    $idTag=$_POST['ids-tags'];
    $_SESSION["tag_id"] = $_POST['ids-tags'];
    ob_start();
    $render->formTagOk();
    $content = ob_get_clean();
    Template::render($content);
