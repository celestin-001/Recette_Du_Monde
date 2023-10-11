<?php

namespace recipe;
use bdedition\Display;
use bdedition\Edition;

class RecipeCreate extends Display
{
    private $create;
    public bool $state = true;
    private $edit='Creer';
    private $class='';
    private $required='required';

    /**
     * Cette fonction permet de générer un formulaire d'une recette avec les champs nécessaires
     * @return void
     */
    public function generateRecette(){
        $action='../../pages/recipe_create.php'?>

        <!-- Champs de creation d'une Recette -->
        <div id="create">
            <?php
            if(!$this->state){
                $action='../../pages/editRecipe.php';
            }
            ?>
            <form id="recette-form" method="post"  enctype="multipart/form-data"
                  action="<?= $action ?>">
                <div id="add">
                    <?php
                    if(!$this->state){
                        $this->required='';
                        $this->edit='Editer';
                        $this->class='display'?>
                        <button type="button" class="start" id="recipe">Edit Recette</button>
                        <button type="button" class="start" id="description">Edit Description</button><?php
                    }
                    ?>

                    <button type="button" class="add-btn" name="ing-btn">Ingredient +</button>
                    <button type="button" class="add-btn" name="tag-btn">Tag +</button>
                </div>
                <div id="info" >
                    <div class="form-input <?= $this->class ?>" id="test">
                        <label for="title"> Title Recette</label>
                        <input class="form-control" type="text" name="title" id="title" <?= $this->required ?>>
                        <label for="file"> Image Recette </label>
                        <input class="form-control" type="file" name="file" id="file" accept="image/png, image/gif, image/jpeg, image/webp">
                    </div>
                </div>
                <label for="title" class="<?= $this->class ?>" id="label"> Description</label>
                <textarea class="form-control add-btn <?= $this->class ?>" type="text" name="desc" id="desc" <?= $this->required ?>></textarea>
                <button type="submit" class="add-btn"><?= $this->edit ?></button>

                <datalist id="list-rec">
                    <?php
                    // on liste tous les ingrédients présents avec la fonction ListIngredients()
                    $tab=$this->ListIngredients();
                    foreach ($tab as $elt){?>
                    <option value="<?= $elt->title ?>"><?php
                        }
                        ?>
                </datalist>
            </form>
            <script src="<?php echo $GLOBALS['JS_DIR']?>create.js"></script>
        </div>


    <?php }

    /**
     * Cette fonction permet de creér une recette avec ses ingrédients et ses tags
     * @param $title
     * @param $ingredients
     * @param $tags
     * @param $description
     * @param $file
     * @param $quantity
     * @param $imgIngredient
     * @return void
     */
    public function createAllRecette($title,$ingredients, $tags, $description =null, $file = null,$quantity=null,$imgIngredient = null){
        if($this->create ==null) $this->create = new RecipeDB();
        $recette_id = $this->create->createRecipe($title,$description,$file);
        $cmptr = 0;
        $cmptr1 = 0;

        foreach ($ingredients as $ingredient){
            $ingredient_id = $this->create->createIngredient($ingredient,$cmptr,$quantity[$cmptr],$imgIngredient);
            $this->create->createIngredientRecette($ingredient_id,$recette_id);
            $cmptr++;
        }

        foreach ($tags as $tag){
            $tag_id = $this->create->createTag($tag,$cmptr1);
            $this->create->createTagRecette($tag_id,$recette_id);
            $cmptr1++;
        }

        header("Location: ".$GLOBALS['DOCUMENT_DIR']."index.php");
        exit() ;
    }
}