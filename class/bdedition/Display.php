<?php

namespace bdedition;

use pdo_config\PdoConfig;
include __DIR__ . "/../../DB_config.php" ;

class Display extends PdoConfig
{

    /**
     * constructeur de la classe Display qui hérite de la
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

    /**
     * cette methode permet d'afficher une recette a partir de son identifiant
     * @param $id_recipe
     * @return : la recette avec tous ses attributs
     */
    public function displayRecipe($id_recipe){
        $query = "SELECT * FROM recette where id='".$id_recipe."'";
        return $this->exec($query, null,"render\RecipeRender");
    }

    /**
     * cette methode permet d'afficher la description
     * liée a la recette dont son id est passé en paramettre
     * @param $id_recipe
     * @return : la recette avec tous ses attributs
     */
    public function displayDesc($id_recipe){
        $query = "SELECT * FROM recette where id='".$id_recipe."'";
        return $this->exec($query, null,"render\RecipeRender");
    }

    /**
     * cette methode permet de lister les ingredients
     * liée a la recette dont son id est passé en paramettre
     * @param $id_recipe
     * @return array|false|null
     */
    public function displayRecipeWithIngredients($id_recipe)
    {
        $query = "select *from ingredient_recette 
                    inner join recette on recette.id = ingredient_recette.recette_id
                    inner join ingredient on ingredient.id = ingredient_recette.ingredient_id
                    where recette.id = '" . $id_recipe . "'";
        return $this->exec($query, null, "render\IngredientRender");
    }


    /**
     * cette methode permet de lister tout les tags
     * liée a la recette dont son id est passé en paramettre
     * @param $id_recipe
     * @return array|false|null
     */
    public function displayRecipeWithTags($id_recipe){
        $query="SELECT * from  tag_recette 
            inner join recette on recette.id = tag_recette.recette_id
            inner join tag on tag.id= tag_recette.tag_id 
            where recette.id='".$id_recipe."'";
        return $this->exec($query, null, "render\TagRender");
    }

    /**
     * cette methode permet de lister le titre des ingredients
     * @return array|false|null
     */
    public function ListIngredients(){
        return $this->exec(
            "SELECT title FROM Ingredient",
            null,
            'render\IngredientRender') ;
    }

}