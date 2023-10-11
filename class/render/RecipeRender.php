<?php

namespace render;

class RecipeRender

{
    private $title;
    private $description;
    private $photo;
    private $id;
    private $tag_id,$recette_id, $ingredient_id;
    private static $index = 0;
    public static $idd;

    /** Cette fonction génére du code HTML qui permet d'afficher une recette
     * @return void
     */
    public function getHTML(){?>
        <div class="recettes">
            <legend class="legend">

                <label class="recettes-tittle tittle"><?= $this->title ?></label>
                <?php
                if(isset($_SESSION['logger'])){
                    ?>
                    <form method="post" enctype="multipart/form-data" action="<?php echo $GLOBALS['DOCUMENT_DIR']?>pages/deleteRecipe.php">
                        <button name="check[<?= self::$index ?>]" type="submit" value="<?= $this->id ?>" id="delete">
                            <img width="20" height="20"
                                 src="https://img.icons8.com/fluency/20/filled-trash.png"
                                 alt="filled-trash"/>
                        </button>
                    </form>
                    <form method="post" enctype="multipart/form-data" action="<?php echo $GLOBALS['DOCUMENT_DIR']?>pages/updateRecipe.php">
                        <button name="ids[<?= self::$index ?>]" type="submit" value="<?= $this->id ?>" id="edit" class="check">
                            <img width="20" height="20"
                                 src="https://img.icons8.com/fluency/20/000000/create-new.png"
                                 alt="create-new"/>
                        </button>
                    </form>

                    <?php
                }
                ?>

            </legend>
            <a href="<?php echo $GLOBALS['DOCUMENT_DIR']?>pages/recipe_with_ingredients_tags.php?id=<?=$this->id?>">
                <img id="img-recipe" src="/recipes_pictures/<?= $this->photo?>" class="img">
            </a>
        </div>
        <?php
        self::$index++;}

    public function displayDescription(){?>
        <p>
            <?= $this->description?>
        </p>
    <?php }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo): void
    {
        $this->photo = $photo;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getTagId()
    {
        return $this->tag_id;
    }

    public function setTagId($tag_id): void
    {
        $this->tag_id = $tag_id;
    }

    public function getRecetteId()
    {
        return $this->recette_id;
    }

    public function setRecetteId($recette_id): void
    {
        $this->recette_id = $recette_id;
    }

    public function getIngredientId()
    {
        return $this->ingredient_id;
    }

    public function setIngredientId($ingredient_id): void
    {
        $this->ingredient_id = $ingredient_id;
    }

}