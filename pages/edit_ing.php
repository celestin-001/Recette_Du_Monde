<?php
require __DIR__."/../config.php" ;
session_start();
    require $GLOBALS['PHP_DIR']."class/Autoloader.php" ;
    Autoloader::register();

    use bdedition\EditionIngredient;
    ob_start();

    // Vérification si le formulaire a été soumis
    if (isset($_POST['valid'])) {
        // Récupération des valeurs du formulaire
        $ingredientId = $_SESSION['ingredient_id']; // L'ID de l'ingrédient à mettre à jour
        $title = $_POST['title-ing']; // Nouveau titre de l'ingrédient
        $quantity = $_POST['quantity-ing']; // Nouvelle quantité de l'ingrédient
        $imgFile = $_FILES['file-ing']; // Nouvelle image de l'ingrédient

        // Appel de la fonction pour mettre à jour l'ingrédient
        $edition = new EditionIngredient();
        $edition->updateIngredient($ingredientId, $title, $quantity, $imgFile);
        // Rediriger l'utilisateur vers la même page
        header("Location: ".$GLOBALS['DOCUMENT_DIR']."pages/recipe_with_ingredients_tags.php?id=".$_SESSION['recipe_id']);
        exit();
    }


    $content = ob_get_clean();
    Template::render($content);