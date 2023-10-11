<?php
require __DIR__."/../config.php" ;
session_start();
    require $GLOBALS['PHP_DIR']."class/Autoloader.php" ;
    Autoloader::register();

    use bdedition\Edition;
    use recipe\RecipeDB;
    $create = new RecipeDB();
    $editon = new Edition();
    ob_start();

        if (isset($_POST['valid'])) {
            $ingredientId = $_SESSION["ingredient_id"];
            // Vous pouvez également utiliser $_POST['ingredient-id'] si vous préférez
            $id = $_SESSION['recipe_id'];
            $title_ing = $_POST['title-ing'];
            $quantity = $_POST['quantity-ing'];
            $image = $_FILES['file-ing'];

            echo '<pre>';

            echo "</pre>";

        }


    $content = ob_get_clean();
    Template::render($content);