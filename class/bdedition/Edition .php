<?php

namespace bdedition;
use pdo_config\PdoConfig;
use recipe\RecipeDB;

include __DIR__ . "/../../DB_config.php" ;


class Edition extends PdoConfig
{
    public const RECIPE_DIR = "recipes_pictures/" ;
    public const INGREDIENT_DIR = "ingredients_pictures/" ;
    private $recipe;

    /**
     * constructeur de la classe Edition qui hérite de la
     * classe PdoConfig pour se connecter à une base de donnée
     */
    public function __construct(){
        // appel au constructeur de la classe pere qui herite de Pdo
        parent::__construct(
            $GLOBALS['db_name'],
            $GLOBALS['db_host'],
            $GLOBALS['db_port'],
            $GLOBALS['db_user'],
            $GLOBALS['db_pwd']) ;
        $this->recipe = new RecipeDB();

    } // fin du constructeur

    /**
     * Cette fonction permet de mettre à jour une recette
     * @param $recipeId : id de la recette
     * @param $title : titre de la recette
     * @param $description : description de la recette
     * @param $imgFile : fichier image de la recette
     * @param $ings : ingrédients de la recette
     * @param $tags : tags de la recette
     * @param $quantity : quantité de la recette
     * @param $imgIngredient : fichier image de l'ingrédient
     * @return void
     */
    public function updateRecette($recipeId, $title = null, $description = null, $imgFile = null,$ings = null, $tags = null,$quantity=null,$imgIngredient=null) {
        $cmptr = 0;
        $cmptr1 = 0;
        $recette_id=$_SESSION['recipe_id'];

        if ($title != null) {
            $this->updateTitreRecipe($title, $recipeId);
        }

        if ($description != null) {
            $this->updateDescriptionRecipe($recipeId, $description);
        }

        if ($imgFile != null && $imgFile !== UPLOAD_ERR_NO_FILE) {
            $this->updateImgRecipe($recipeId, $imgFile);
        }
        foreach ($ings as $ingredient){
            $ingredient_id = $this->recipe->createIngredient($ingredient,$cmptr,$quantity[$cmptr],$imgIngredient);
            $this->recipe->createIngredientRecette($ingredient_id,$recette_id);
            $cmptr++;
        }

        foreach ($tags as $tag){
            $tag_id = $this->recipe->createTag($tag,$cmptr1);
            $this->recipe->createTagRecette($tag_id,$recette_id);
            $cmptr1++;
        }
    }

     /**
     * cette fonction permet d'editer l'image de la reccette
     * Si l'utilisateur fait changer l'image
     * @param $id
     * @param $imgFile
     * @return void
     */
    public function updateImgRecipe($id, $imgFile) {
        $imgName = null;
        // enregistrement du fichier uploadé
        if ($imgFile != null && $imgFile['error'] !== UPLOAD_ERR_NO_FILE) {
            $tmpName = $imgFile['tmp_name'];
            $imgName = $imgFile['name'];
            $imgName = urlencode(htmlspecialchars($imgName));

            $dirname = $GLOBALS['PHP_DIR'] . self::RECIPE_DIR;
            if (!is_dir($dirname)) mkdir($dirname);
            $uploaded = move_uploaded_file($tmpName, $dirname . $imgName);
            if (!$uploaded) die("NOT UPLOADED");
        } else {
            echo "NO IMAGE !!!!";
            return;
        }

        $query = "UPDATE Recette SET photo = :photo WHERE id = :id";
        $params = [
            'photo' => $imgName,
            'id' => $id
        ];
        $this->exec($query, $params);
    }

    /**
     * cette fonction permet d'editer la description de la reccette
     * si l'utilsateur fait changer sa description
     * @param $id
     * @param $description
     * @return void
     */
    public function updateDescriptionRecipe($id, $description) {
        $query = "UPDATE Recette SET description = :description WHERE id = :id";
        $params = [
            'description' => $description,
            'id' => $id
        ];
        $this->exec($query, $params);
    }

    /**
     * cette fonction permet d'editer le titre de la reccette
     * Si l'utilsateur fait changer son titre
     * @param $title
     * @param $id
     * @return void
     */
    public function updateTitreRecipe($title, $id) {
        $query = "UPDATE Recette SET title = :title WHERE id = :id";
        $params = [
            'title' => $title,
            'id' => $id
        ];
        $this->exec($query, $params);
    }

    /**
     * Cette fonction permet de mettre à jour le titre d'un ingrédient
     * @param $title
     * @param $id
     * @return void
     */
    public function updateTitreIngredient($title, $id) {
        $query = "UPDATE Ingredient SET title = :title WHERE id = :id";
        $params = [
            'title' => $title,
            'id' => $id
        ];
        $this->exec($query, $params);
    }

    /**
     * cette fonction permet de mettre à jour la quantité d'un ingrédient
     * @param $quantity
     * @param $id
     * @return void
     */
    public function updateQuantityIngredient($quantity, $id) {
        $query = "UPDATE Ingredient SET quantity = :quantity WHERE id = :id";
        $params = [
            'quantity' => $quantity,
            'id' => $id
        ];
        $this->exec($query, $params);
    }

    /**
     * Cette fonction permet de mettre à jour l'image d'un ingrédient
     * @param $imgFile
     * @param $id
     * @return void
     */
    public function updateImgIngredient($imgFile, $id) {
        $imgName = null;
        // enregistrement du fichier uploadé
        if ($imgFile != null && $imgFile['error'] !== UPLOAD_ERR_NO_FILE) {
            $tmpName = $imgFile['tmp_name'];
            $imgName = $imgFile['name'];
            $imgName = urlencode(htmlspecialchars($imgName));

            $dirname = $GLOBALS['PHP_DIR'] . self::INGREDIENT_DIR;
            if (!is_dir($dirname)) mkdir($dirname);
            $uploaded = move_uploaded_file($tmpName, $dirname . $imgName);
            if (!$uploaded) die("NOT UPLOADED");
        } else {
            echo "NO IMAGE !!!!";
            return;
        }
        $query = "UPDATE Ingredient SET image = :image WHERE id = :id";
        $params = [
            'image' => $imgName,
            'id' => $id
        ];
        $this->exec($query, $params);
    }

    /**
     * Cette fonction permet de mettre à jour un tag
     * @param $htag
     * @param $id
     * @return array|false|null
     */
    public function updateTag($htag, $id) {
        $query = "UPDATETag SET htag = '".$htag."'
                WHERE id = '".$id."' ";
        $params = ['htag' => $htag];
        return $this->exec($query, $params);
    }

}