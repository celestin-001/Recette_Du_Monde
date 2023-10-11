<?php

namespace render;

class IngredientRender
{
    public $title;
    private static $index = 0;
    private $image;
    private $quantity;
    private $description;
    private $photo;
    private $id;
    private $tag_id,$recette_id, $ingredient_id;


    public function getHTML()
    {
        ?>
        <div class="ingredients">
            <legend class="legend">
                <label class="ingredient-name"><?= $this->title ?></label>
                <?php
                if(isset($_SESSION['logger'])){
                    ?>
                    <form method="post" enctype="multipart/form-data" action="<?php echo $GLOBALS['DOCUMENT_DIR']?>pages/delete_ingredients_tags.php">
                        <button name="check-ing[<?= self::$index ?>]" type="submit" value="<?= $this->id ?>" id="delete">
                            <img width="20" height="20"
                                 src="https://img.icons8.com/fluency/20/filled-trash.png"
                                 alt="filled-trash"/>
                        </button>
                    </form>
                        <form method="POST" action="<?php echo $GLOBALS['DOCUMENT_DIR']?>pages/updateIngredient.php">
                            <button name="isd-ing[<?= self::$index ?>]" type="submit" value="<?= $this->id ?>" id="edit" class="check-ing">
                                <img width="20" height="20" src="https://img.icons8.com/fluency/20/000000/create-new.png"
                                     alt="create-new"/>
                            </button>
                        </form>

                    <?php
                }
                ?>
            </legend>
            <img src="/ingredients_pictures/<?= $this->image ?>" class="img">
            <b><?= $this->quantity ?></b>
        </div>
        <?php
        self::$index++;
    }

    /**
     * Cette fonction permet de générer un Formulaire pour editer
     * un ingredient ou des ingredients appartenant à une recette
     * @return void
     */
    public function generateIngredient(){?>
        <form method="post" id="form-ing"
              action="<?php echo $GLOBALS['DOCUMENT_DIR']?>pages/edit_ing.php"
               enctype="multipart/form-data">
            <div id="back-ing">
                <div id="button">
                    <button id="ed_title_ing" class="add-btn" type="button">Edit title</button>
                    <button id="ed_img_ing" class="add-btn" type="button">Edit image</button>
                    <button id="ed_quan_ing" class="add-btn" type="button">Edit quantity</button>
                    <button  name="valid" type="submit"  class="add-btn">Valider</button>
                </div>

            </div>
        </form>
 <?php }

    /** Cette fonction permet de générer un formulaire de création d'un nouvel ingrédient
     * @return void
     */
       public function new(){?>
        <form method="post" id="form-ing1"
              action="<?php echo $GLOBALS['DOCUMENT_DIR']?>pages/edit_ing.php"
              enctype="multipart/form-data">
            <div id="back-ing1">
                <div class="btn-ingredient" id="button">
                    <label for="title-ing"> Title Ingredient</label>
                    <input class="form-control" type="text" name="title-ing" id="title-ing">

                    <label for="quantity-ing"> Quantity Ingredient</label>
                    <input class="form-control" type="text" name="quantity-ing" id="quantity-ing">

                    <label for="file-ing"> Image Ingrédient </label>
                    <input class="form-control" type="file" name="file-ing" id="file-ing" accept="image/png, image/gif, image/jpeg, image/webp">
                </div>
                <button  name="valid" type="submit" id="btn-valid"  class="add-btn">Valider</button>
            </div>
        </form>
   <?php }

    public function displayIngredients()
    {
        ?>
        <div class="ingredients">
            <legend class="legend">
                <label class="ingredient-name"><?= $this->title ?></label>
            </legend>
            <img src="/ingredients_pictures/<?= $this->image ?>" class="img">
        </div>
        <?php
    }


    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo): void
    {
        $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getTagId()
    {
        return $this->tag_id;
    }

    /**
     * @param mixed $tag_id
     */
    public function setTagId($tag_id): void
    {
        $this->tag_id = $tag_id;
    }

    /**
     * @return mixed
     */
    public function getRecetteId()
    {
        return $this->recette_id;
    }

    /**
     * @param mixed $recette_id
     */
    public function setRecetteId($recette_id): void
    {
        $this->recette_id = $recette_id;
    }

    /**
     * @return mixed
     */
    public function getIngredientId()
    {
        return $this->ingredient_id;
    }

    /**
     * @param mixed $ingredient_id
     */
    public function setIngredientId($ingredient_id): void
    {
        $this->ingredient_id = $ingredient_id;
    }




}?>



