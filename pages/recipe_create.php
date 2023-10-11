<?php
require __DIR__."/../config.php" ;
session_start();
    require $GLOBALS['PHP_DIR']."class/Autoloader.php" ;
    Autoloader::register();
use recipe\RecipeCreate;

$create = new RecipeCreate();

    /**
     * Cette page permet de créer une recette avec ces ingredients , ses tags
     * en appellant la methode createAllRecette
     */
    ob_start();
    if(isset($_POST['title'])){
        // recuparation de champs d'une recette
        $title = ($_POST['title']);
        $description =$_POST['desc'];
        $file = ($_FILES['file']);

        // recuparation de champs d'ingredient
        $ings = ($_POST['ing']);
        $imgIng = $_FILES['file-ing'];
        $quantity = $_POST['quantity'];

        //recuparation de champs de tag
        $tags =($_POST['tag']);

        $create->createAllRecette($title,$ings,$tags,$description,$file,$quantity,$imgIng);
    }

    else {
        $create->generateRecette();
    }
    $content = ob_get_clean();
    Template::render($content);