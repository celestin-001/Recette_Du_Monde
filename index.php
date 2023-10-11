<?php
require_once "config.php";

    require $GLOBALS['PHP_DIR']."class/Autoloader.php";
    Autoloader::register();


    header('Location:'.$GLOBALS['DOCUMENT_DIR']."pages/acceuil.php");
    exit();
    ob_start();
    $content = ob_get_clean();
    Template::render($content);

