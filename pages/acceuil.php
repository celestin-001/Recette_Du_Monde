<?php
require __DIR__."/../config.php" ;
session_start();
require $GLOBALS['PHP_DIR']."class/Autoloader.php" ;
Autoloader::register();
    use recipe\RecipeDB;

    $recettes = new RecipeDB();
    $results = $recettes->getRecettes();

    /**
     * Cette page permet de lister les recettes disponible
     * des le lancement de notre site
     */
    ob_start();?>
            <div id="recette-content">
                <?php
                foreach ($results as $recette): ?>
                    <?= $recette->getHTML();
                endforeach;?>
            </div>

            <form method="post" id="form"
                  action="editRecipe.php"
                  class="display" enctype="multipart/form-data">
                <div id="back">
                    <div id="button">
                        <button id="ed_title" class="add-btn" type="button">Edit title</button>
                        <button id="ed_img" class="add-btn" type="button">Edit image</button>
                        <button id="ed_des" class="add-btn" type="button">Edit description</button>
                        <button  name="valid" type="submit" class="add-btn">Valider</button>
                    </div>

                </div>
                <input type="hidden" name="id-recipe" value="<?= $_SESSION['recipe_id']?>">
            </form>
    <?php
    $content = ob_get_clean();
    Template::render($content);