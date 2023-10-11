<?php

namespace render;

class TagRender
{
    private $id, $title, $picture, $description, $photo, $tag_id,$recette_id, $ingredient_id, $htag;
    private static $index = 0;

    /**
     * @return mixed
     */
    public function getHtag()
    {
        return $this->htag;
    }

    /**
     * @param mixed $htag
     */
    public function setHtag($htag): void
    {
        $this->htag = $htag;
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

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture): void
    {
        $this->picture = $picture;
    }

    public function getDescription()
    {
        return $this->description;
    }

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

    /** Cette fonction genere du code HTML pour un tag avec les options de modifications et de suppression
     * @return void
     */
    public function getHTML(){?>
        <div class="tags">
            <legend class="legend">
                <label class="tags-name"><?= $this->htag?></label>
                <?php
                if(isset($_SESSION['logger'])){
                    ?>
                    <form method="post" enctype="multipart/form-data" action="<?php $GLOBALS['DOCUMENT_DIR']?>delete_ingredients_tags.php">
                        <button name="check-tag[<?= self::$index ?>]" type="submit" value="<?= $this->id ?>" id="delete">
                            <img width="20" height="20"
                                 src="https://img.icons8.com/fluency/20/filled-trash.png"
                                 alt="filled-trash"/>
                        </button>
                    </form>

                    <form method="POST" action="<?php echo $GLOBALS['DOCUMENT_DIR']?>pages/updateTag.php">
                        <button name="ids-tags[<?= self::$index ?>]" type="submit" value="<?= $this->id ?>" id="edit" class="check-tag">
                            <img width="20" height="20" src="https://img.icons8.com/fluency/20/000000/create-new.png"
                                 alt="create-new"/>
                        </button>
                    </form>
                    <?php
                }
                ?>
            </legend>
        </div>
        <?php
        self::$index++;}

    /** cette fonction permet de générer un formulaire d'un tag
     * @return void
     */
    public function formTag(){?>
        <form method="post" id="form-tag"
              action="<?php echo $GLOBALS['DOCUMENT_DIR']?>pages/editTag.php"
              enctype="multipart/form-data">
            <div id="back-tag">
                <div id="button">
                    <button id="ed_title_tag" class="add-btn" type="button">Edit Tag</button>
                    <button  name="valid-tag" type="submit"  class="add-btn">Valider</button>
                </div>
            </div>
        </form>
    <?php }

    /**
     * cette fonction permet de générer un formulaire d'un tag
     * @return void
     */
    public function formTagOk(){?>
        <form method="post" id="form-tagOK"
              action="<?php echo $GLOBALS['DOCUMENT_DIR']?>pages/editTag.php"
              enctype="multipart/form-data">
            <div id="back-tagOK">
                <div id="button">
                    <label for="htag"> update Tag</label>
                    <input class="form-control" type="text" name="htag" id="htag">
                    <button  name="valid-tag" type="submit" >Valider</button>
                </div>
            </div>
        </form>
    <?php }
}