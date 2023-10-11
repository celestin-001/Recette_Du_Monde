<?php
require __DIR__."/../config.php" ;
session_start();
require $GLOBALS['PHP_DIR']."class/Autoloader.php" ;
Autoloader::register();

    use bdedition\SearchDelete;
    $create = new SearchDelete();

    /**
     * cette page permet de creer le fichier sql qui comporte
     * la base de donné initial a l'acceuil au cas ou
     * l'utilsateur fait une destruction total des recettes
     */
    // Obtenir le chemin absolu du fichier
    $filename = 'E:/ETUDES_SECONDAIRES/CM_TP_L2_INFO/SGBDR/bdrecette.sql';

    // Vérifier si le fichier existe
    if (file_exists($filename)) {
        // Appeler la fonction createDatabase avec le chemin absolu
        $create->createDatabase($filename);
        header("Location: ".$GLOBALS['DOCUMENT_DIR']."index.php");
        exit() ;
    } else {
        echo "Le fichier bdrecette.sql n'existe pas.";
    }

