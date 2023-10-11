<?php

namespace bdedition;

use pdo_config\PdoConfig;
include __DIR__ . "/../../DB_config.php" ;

class SearchDelete extends PdoConfig
{

    /**
     * constructeur de la classe SearchDelete qui hérite de la
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
     * cette methode permet de rechercher une recette
     * a partir de son nom passé en parametre et de l'afficher
     * @param $title
     * @return void
     */
    public function searchRecipe($title) {

        $query = "SELECT * FROM recette where title like :name";
        $param = [':name' => '%'.$title.'%'];
        $results = $this->exec($query, $param,"render\RecipeRender");
        foreach ($results as $r){
            $r->getHTML();
        }
    }

    /**
     * cette fonction permet de rechercher les recettes disponible et les afficher à partir du nom de leur Ingredient
     * @param $name
     * @return void
     */
    public function searchRecipeByIngredient($name){
        $query ="SELECT recette.id, recette.title, recette.photo FROM recette
            INNER JOIN Ingredient_recette ON recette.id = Ingredient_Recette.recette_id
            INNER JOIN Ingredient ON Ingredient.id = Ingredient_Recette.Ingredient_id
            WHERE Ingredient.title LIKE :name";

        $param = [':name' => '%'.$name.'%'];
        $results = $this->exec($query, $param,"render\RecipeRender");
        foreach ($results as $r){
            $r->getHTML();
        }
    }

    /**
     * cette fonction permet de rechercher des recettes à partir du nom d'un Tag et les afficher
     * @param $name
     * @return void
     */
    public function searchRecipewithTag($name){
        $query = "SELECT * FROM recette
            INNER JOIN tag_recette ON recette.id = tag_recette.recette_id
            INNER JOIN tag ON tag.id = tag_recette.tag_id
            WHERE tag.htag LIKE :name";

         $param = [':name' => '%'.$name.'%'];
        $results = $this->exec($query, $param,"render\RecipeRender");
        foreach ($results as $r){
            $r->getHTML();
        }
    }

    /**
     * cette fonction permet de supprimer toute les recettes dont leur identifiant se trouve en meme temps
     * sur la table INgredient_recette et Tag_recette
     * @return void
     */
    public function deleteAllRecipes() {
        $query = "DELETE FROM Recette WHERE id IN (SELECT recette_id FROM Ingredient_Recette)
                  AND id IN (SELECT recette_id FROM Tag_Recette)";
        $this->exec($query,null);

    }

    /**
     * cette methode permet de suprimer une recette
     * ainsi que les enregistrements correspondants
     * dans les tables "Ingredient_Recette" et "Tag_Recette"
     * a partir
     * @param $ids
     * @return array|false|null
     */
    public function deleteRecipe($ids) {
        //La fonction implode est utilisée pour transformer le tableau $ids en une chaîne de
        // caractères, où les identifiants sont séparés par des virgules
        $idsString = implode(',', $ids);
        $query = "DELETE Recette, Ingredient_Recette, Tag_Recette
                  FROM Recette
                  LEFT JOIN Ingredient_Recette ON Recette.id = Ingredient_Recette.recette_id
                  LEFT JOIN Tag_Recette ON Recette.id = Tag_Recette.recette_id
                  WHERE Recette.id IN ($idsString)";
        return $this->exec($query, null);
    }

    /**
     * cette fonction permet de supprimer un(des) ingrédient(s) à partir de leur id(s)
     * liées a une recette
     * @param $ids
     * @return array|false|null
     */
    public function deleteIngredient($ids) {
        //La fonction implode est utilisée pour transformer le tableau $ids en une chaîne de
        // caractères, où les identifiants sont séparés par des virgules
        $idsString = implode(',', $ids);
        $query = "DELETE Ingredient,Ingredient_Recette
                    FROM Ingredient
                    LEFT JOIN Ingredient_Recette on Ingredient.id = Ingredient_Recette.Ingredient_id
                    where Ingredient.id IN ($idsString)";
        echo $query;
        return $this->exec($query, null);
    }

    /**
     * cette fonction permet de supprimer un(des) Tag(s) à partir de leur id(s)
     * liées a une recette
     * @param $ids
     * @return array|false|null
     */
    public function deleteTag($ids) {
        //La fonction implode est utilisée pour transformer le tableau $ids en une chaîne de
        // caractères, où les identifiants sont séparés par des virgules
        $idsString = implode(',', $ids);
        $query = "DELETE Tag, Tag_Recette
                  FROM Tag
                  LEFT JOIN Tag_Recette ON Tag.id = Tag_Recette.Tag_id
                  WHERE Tag.id IN ($idsString)";
        return $this->exec($query, null);
    }

    /**
     * cette methode permet de creer la base de donnée
     * en passant le chemin ou se trouve le fichier sql via le navigateur
     * @param $filename
     * @return void
     */
    function createDatabase($filename) {
        try {
            $sql = file_get_contents($filename);

            // Séparer les instructions de création et d'insertion
            $statements = preg_split('/;\s*(?=CREATE|INSERT)/', $sql);
            $insertStatements = array_slice($statements, 5);

            // Exécuter les instructions de création
            foreach ($statements as $statement) {
                $this->exec($statement, null);
            }

            // exécuter les instructions d'insertion
            foreach ($insertStatements as $statement) {
                $this->exec($statement, null);
            }

            echo "La base de données a été créée avec succès et les données ont été insérées.";
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

}