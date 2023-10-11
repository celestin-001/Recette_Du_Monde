<?php
require __DIR__."/../config.php" ;
session_start();
require $GLOBALS['PHP_DIR']."class/Autoloader.php" ;
    Autoloader::register();
    use bdedition\SearchDelete;

    /**
     * cette page permet de suprimer les recettes qui sont sur la page
     * et aussi sur la base de donnée, en mode administrateur
     */
    ob_start();
    $delete = new SearchDelete();
    $delete->deleteAllRecipes();?>
    <div class="delete">
        <div><h1> Desolé mais tu a tout detruis les recettes </h1></div>
        <div class="delete-img"><img src="../images/regret.jpg"></div>
    </div>
   <?php $content = ob_get_clean();
    Template::render($content);

