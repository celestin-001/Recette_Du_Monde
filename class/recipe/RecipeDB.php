<?php
namespace recipe;

use pdo_config\PdoConfig;
include __DIR__ . "/../../DB_config.php" ;

class RecipeDB extends PdoConfig
{

    public const RECIPE_DIR = "recipes_pictures/" ;
    public const INGREDIENT_DIR = "ingredients_pictures/" ;

    /**
     * constructeur de la classe RecipeDB qui hérite de la
     * classe PdoConfig pour se connecter à la base de donnée
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

    /**
     * Une fonction qui permet de lister toutes les recettes disponibles
     * @return array|false|null
     */
    public function getRecettes(){
        return $this->exec(
            "SELECT * FROM Recette",
            null,
            'render\RecipeRender') ;
    }

    /**
     * Une fonction qui permet de lister toutes les ingredients disponibles
     * @return array|false|null
     */
    public function getIngredients(){
        return $this->exec(
            "SELECT * FROM Ingredient",
            null,
            'render\IngredientRender') ;
    }

    /**
     * Une fonction qui permet de lister toutes les tags disponibles
     * @return array|false|null
     */
    public function getTags(){
        return $this->exec(
            "SELECT * FROM Tag",
            null,
            'render\TagRender') ;
    }

     // Creation d'une recette

    /**
     * @param $name : titre de la recette
     * @param $description : description de la recette
     * @param $imgFile : fichier image de la recette
     * @return int : retourne l'id de la recette
     */
    public function createRecipe($name,$description = null, $imgFile = null):int
    {
        $name = htmlspecialchars($name);
        $description = htmlspecialchars($description);
        $imgName = null;
        // enregistrement du fichier uploadé
        if ($imgFile != null) {
            $tmpName = $imgFile['tmp_name'];
            $imgName = $imgFile['name'];
            $imgName = urlencode(htmlspecialchars($imgName));

            $dirname = $GLOBALS['PHP_DIR'] . self::RECIPE_DIR;
            if (!is_dir($dirname)) mkdir($dirname);
            $uploaded = move_uploaded_file($tmpName, $dirname . $imgName);
            if (!$uploaded) die("NOT UPLOADED");
        } else echo "NO IMAGE !!!!";

        $query = 'INSERT INTO recette(title, description, photo) VALUES (:title, :description, :photo)';
        $params = [
            'title' => htmlspecialchars($name),
            'description' => htmlspecialchars($description),
            'photo' => $imgName
        ];

        $this->exec($query, $params);
        $recette_id = $this->pdo->lastInsertId(); // recuperer l'id du dernier element ajouté a la base de donné
        return $recette_id;
    }

    /**
     * Creation d'un tag
     * @param $name : nom du tag
     * @return int : retourne l'id du tag
     */
    public function createTag($name):int
    {
        $name = htmlspecialchars($name);
        $query = 'INSERT INTO tag(htag) VALUES (:htag)';
        $params = [
            'htag' => $name
        ];

        $this->exec($query, $params);
        $tag_id = $this->pdo->lastInsertId(); // recuperer l'id du dernier element ajouté a la base de donné
        return $tag_id;
    }

    /**
     * cette methode crée un ingredient mais si l'ingredient existe deja
     * l'utlisateur peut l'ajouter mais ne peux pas le créer
     * @param $name
     * @param $counter
     * @param $quantity
     * @param $imgFile
     * @return int : retourne l'id de l'ingredient
     */
    public function createIngredient($name, $counter, $quantity = null, $imgFile = null): int
    {
        $name = htmlspecialchars($name);
        $imgName = null;

        // enregistrement du fichier uploadé
        if ($imgFile != null && $imgName === null) {
            $tmpName = $imgFile['tmp_name'][$counter];
            $imgName = $imgFile['name'][$counter];
            $imgName = urlencode(htmlspecialchars($imgName));

            $dirname = $GLOBALS['PHP_DIR'] . self::INGREDIENT_DIR;
            if (!is_dir($dirname)) mkdir($dirname);
            $uploaded = move_uploaded_file($tmpName, $dirname . $imgName);
            if (!$uploaded) {
                // Si le téléchargement du fichier échoue, on récupère l'image de l'ingrédient existant
                $imgName = $this->getImage($name);
            }
        }else if( $imgName === null) {
            echo "NO IMAGE !!!!";
        }

        // Vérification si l'ingrédient existe déjà
        $query = 'SELECT id, image FROM ingredient WHERE title = :title';
        $params = [
            'title' => $name,
        ];
        $result = $this->exec($query, $params);

        if ($result) {
            // Si l'ingrédient existe déjà, on récupère son ID et son image existante
            $ingredient_id = $result[0]['id'];
            if ($imgName === null) {
                $imgName = $result[0]['image'];
            }

            // Mise à jour de l'ingrédient existant avec la nouvelle quantité
            $query = 'UPDATE ingredient SET quantity = :quantity, image = :image WHERE id = :id';
            $params = [
                'quantity' => $quantity,
                'image' => $imgName,
                'id' => $ingredient_id,
            ];
            $this->exec($query, $params);
        } else {
            // Sinon, on crée un nouvel ingrédient
            $query = 'INSERT INTO ingredient(title, quantity, image) VALUES (:title, :quantity, :image)';
            $params = [
                'title' => $name,
                'quantity' => $quantity,
                'image' => $imgName,
            ];
            $this->exec($query, $params);
            $ingredient_id = $this->pdo->lastInsertId(); // recuperer l'id du dernier element ajouté a la base de donné
        }
        return $ingredient_id;
    }

    /**
     * Mis a jour de la table ingredientRecette
     * @param $ingredient_id
     * @param $recette_id
     * @return void
     */
    public function createIngredientRecette($ingredient_id, $recette_id){
        $query = 'INSERT INTO Ingredient_Recette(ingredient_id, recette_id) VALUES (:ingredient_id, :recette_id)';

        $params = [
            'ingredient_id' => $ingredient_id,
            'recette_id' => $recette_id
        ];
        $this->exec($query, $params);

    }

    /**
     * Mis a jour de la table tagRecette
     * @param $tag_id
     * @param $recette_id
     * @return void
     */
    public function createTagRecette($tag_id, $recette_id){
        $query = 'INSERT INTO Tag_Recette(tag_id, recette_id) VALUES (:tag_id, :recette_id)';
        $params = [
            'tag_id' => $tag_id,
            'recette_id' => $recette_id
        ];
        $this->exec($query, $params);
    }

    /**
     * Cette fonction permet de recuperer l'image qui existe deja sur la base de donnée
     * @param $name
     * @return mixed|string
     */
    public function getImage($name){
        $query = "SELECT image from ingredient where title = :title";
        $params = [
            'title' => $name,
        ];
        $result = $this->exec($query, $params);
        if ($result) {
            return $result[0]['image'];
        } else {
            // Si l'image de l'ingrédient n'existe pas, on retourne une valeur par défaut
            return "farine.webp";
        }
    }


}



