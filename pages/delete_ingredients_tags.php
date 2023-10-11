<?php
require __DIR__."/../config.php" ;
session_start();
require $GLOBALS['PHP_DIR']."class/Autoloader.php" ;
Autoloader::register();

    use bdedition\SearchDelete;
    $edition = new SearchDelete();

    ob_start();
    /**
     * cette page permet de suprimer soit un ingredient ou soit un tag
     * ou la combinaison de deux
     */
    if (isset($_POST['check-ing']) || isset($_POST['check-tag'])) {
        $idsIngs = $_POST['check-ing'];
        $idsTags = $_POST['check-tag'];

        // Vérifier si des ingrédients ont été sélectionnés
        if (!empty($idsIngs)) {
            $edition->deleteIngredient($idsIngs);

        } // Vérifier si des tags ont été sélectionnés
        elseif (!empty($idsTags)) {
            $edition->deleteTag($idsTags);
        }

        // Rediriger l'utilisateur vers la même page
        header("Location: " . $GLOBALS['DOCUMENT_DIR'] . "pages/recipe_with_ingredients_tags.php?id=" . $_SESSION['recipe_id']);
        exit();
}

    $content = ob_get_clean();
    Template::render($content);


