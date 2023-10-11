<?php

namespace bdedition;
use pdo_config\PdoConfig;
use recipe\RecipeDB;

include __DIR__ . "/../../DB_config.php" ;

class EditionIngredient extends PdoConfig
{

    public const INGREDIENT_DIR = "ingredients_pictures/" ;

    /**
     * constructeur de la classe EditionINgredient qui hérite de la
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

    } // fin du constructeur

    // Cette fonction permet de mettre à jour un ingrédient
    public function updateIngredient($ingredientId, $title = null, $quantity = null, $imgFile = null) {
        if ($title != null) {
            $this->updateIngredientTitle($ingredientId, $title);
        }

        if ($quantity != null) {
            $this->updateIngredientQuantity($ingredientId, $quantity);
        }

        if ($imgFile != null && $imgFile !== UPLOAD_ERR_NO_FILE) {
            $this->updateIngredientImage($ingredientId, $imgFile);
        }
    }

    // Cette fonction permet de mettre à jour le titre d'un ingrédient
    public function updateIngredientTitle($id, $title) {
        $query = "UPDATE Ingredient SET title = :title WHERE id = :id";
        $params = [
            ':title' => $title,
            ':id' => $id
        ];
        $this->exec1($query, $params);
    }

// Cette fonction permet de mettre à jour la quantité d'un ingrédient
    public function updateIngredientQuantity($id, $quantity) {
        $query = "UPDATE Ingredient SET quantity = :quantity WHERE id = :id";
        $params = [
            ':quantity' => $quantity,
            ':id' => $id
        ];
        $this->exec1($query, $params);
    }

// Cette fonction permet de mettre à jour l'image d'un ingrédient
    public function updateIngredientImage($id, $imgFile) {
        $imgName = null;
        // Enregistrement du fichier uploadé
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
            ':image' => $imgName,
            ':id' => $id
        ];
        $this->exec1($query, $params);
    }

}

