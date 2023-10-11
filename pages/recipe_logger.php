<?php
require __DIR__."/../config.php" ;
session_start();
    require $GLOBALS['PHP_DIR']."class/Autoloader.php" ;
    Autoloader::register();
use recipe\RecipeLogin;

    /**
     *  Cette page permet à l'utilisateur de se connecter pour se mettre en mode administrateur
     */

    $error = null;
    $logger = new RecipeLogin();
    if(isset($_POST['user']) && isset($_POST['pwd'])){
        $user = $_POST['user'];
        $password = $_POST['pwd'];
        $log = $logger->checkLogin($user, $password);
        if ($log['access']) {
            $_SESSION['logger'] = $log['username'] ; // creation du session pour le client
            header("Location: ".$GLOBALS['DOCUMENT_DIR']."index.php");
            exit() ;
        }

    }

    ob_start();
        if (!isset($log)) {
            $logger->generateLogin($error);
        }
        elseif (!$log['access']) {
            $logger->generateLogin($log['error']);

        }
         $content = ob_get_clean() ;
         Template::render($content);
