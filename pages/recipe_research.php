<?php
require __DIR__."/../config.php" ;
session_start();
require $GLOBALS['PHP_DIR']."class/Autoloader.php" ;
Autoloader::register();
    use recipe\RecipeDB;
    use bdedition\SearchDelete;
    use bdedition\Display;

    $recipeDB = new RecipeDB();
    $edition = new SearchDelete();
    $display = new Display();

    /**
     * Cette page permet de rechercher une recette par son nom
     *  ou par le nom  de son ingrédient
     * ou par le nom de son tag
     */
    ob_start();
    if(isset($_POST['search'])) {
        $nameResearch = htmlspecialchars($_POST['search']);
        $edition->searchRecipe($nameResearch);
        $edition->searchRecipeByIngredient($nameResearch);
        $edition->searchRecipewithTag($nameResearch);
    }

    $content = ob_get_clean();
    Template::render($content);
