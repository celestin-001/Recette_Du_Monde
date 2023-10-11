<?php
require __DIR__."/../config.php" ;
session_start();
require $GLOBALS['PHP_DIR']."class/Autoloader.php" ;
Autoloader::register();

    use bdedition\Edition;
    $edition = new Edition();
    ob_start();

    // Vérification si le formulaire a été soumis
    if (isset($_POST['valid-tag'])) {
        // Récupération des valeurs du formulaire
        $tagId =  $_SESSION["tag_id"] ; // L'ID de l'ingrédient à mettre à jour
        $htag = $_POST['htag'];
        var_dump($tagId);
        var_dump($htag);
        $edition->updateTag($tagId,$htag);
        // Rediriger l'utilisateur vers la même page
        header("Location: ".$GLOBALS['DOCUMENT_DIR']."pages/recipe_with_ingredients_tags.php?id=".$_SESSION['recipe_id']);
        exit();
    }


    $content = ob_get_clean();
    Template::render($content);