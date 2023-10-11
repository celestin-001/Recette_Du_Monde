<?php
require __DIR__."/../config.php" ;
session_start();
require $GLOBALS['PHP_DIR']."class/Autoloader.php" ;
Autoloader::register();

    use bdedition\Edition;
    use recipe\RecipeCreate;

    $create = new RecipeCreate();
    $create->state = false;
    $update = new Edition();
    $recipe_id = $_POST['id-recipe'];
    /**
     *  Cette page permet de mettre à jour une recette , ou un ingrédient ou un tag
     */
    if(isset($_SESSION['recipe_id'])){
        $recipe_id = $_SESSION['recipe_id'];
        // recuparation de champs de recette à editer
        $title = ($_POST['title']);
        $description = $_POST['desc'];
        $file = ($_FILES['file']);

        // recuparation de champs d'ingredients
        $ings = ($_POST['ing']);
        $imgIng = $_FILES['file-ing'];
        $quantity = $_POST['quantity'];

        //recuparation de champs de tag
        $tags = ($_POST['tag']);

        $update->updateRecette($recipe_id, $title, $description, $file, $ings, $tags, $quantity, $imgIng);
    } else {
        $create->generateRecette();
    }
    // Rediriger l'utilisateur vers la même page
    header("Location: ".$GLOBALS['DOCUMENT_DIR']."pages/recipe_with_ingredients_tags.php?id=".$_SESSION['recipe_id']);
    exit();


