<?php

namespace pdo_config;

use \PDO ;

class PdoConfig
{

    private $db_name ;
    private $db_user ;
    private $db_pwd ;
    private $db_host ;
    private $db_port ;
    public $pdo ;

    /**
     * @param $db_name
     * @param $db_host
     * @param $db_port
     * @param $db_user
     * @param $db_pwd
     */
    public function __construct($db_name, $db_host='localhost', $db_port='3306', $db_user = 'phpmyadmin', $db_pwd='1509'){
        $this->db_name = $db_name ;
        $this->db_host = $db_host ;
        $this->db_port = $db_port ;
        $this->db_user = $db_user ;
        $this->db_pwd = $db_pwd ;

        $dsn = 'mysql:dbname=' . $this->db_name . ';host='. $this->db_host. ';port=' . $this->db_port;
        try{
            $this->pdo = new PDO($dsn, $this->db_user, $this->db_pwd);
        }catch (\Exception $ex){
            die('Error : ' . $ex->getMessage()) ;
        }
    }

    /**
     * cette fonction exécute une requête SQL préparée avec des paramètres,
     * récupère les résultats de la requête et les retourne sous forme de tableau associatif
     * @param $statement
     * @param $params
     * @param $classname
     * @return array|false|void
     */
    public function exec($statement, $params, $classname=null){
        $res = $this->pdo->prepare($statement) ;
        $res->execute($params) or die(print_r($res->errorInfo()));

        if($classname != null){
            $data = $res->fetchAll(PDO::FETCH_CLASS, $classname);
        }else{
            $data = $res->fetchAll(PDO::FETCH_ASSOC); // Utilisation de FETCH_ASSOC
        }

        return $data ;
    }

    /**
     * cette fonction exécute une requête SQL préparée avec des paramètres,
     * récupère les résultats de la requête et les retourne sous forme de tableau associatif
     * @param $statement
     * @param $params
     * @param $classname
     * @return array|false|void
     */
    public function exec1($statement, $params, $classname = null) {
        $res = $this->pdo->prepare($statement);
        foreach ($params as $key => $value) {
            // Si la valeur est un tableau, convertissez-la en une chaîne séparée par des virgules
            if (is_array($value)) {
                $params[$key] = implode(',', $value);
            }
        }
        $res->execute($params) or die(print_r($res->errorInfo()));

        if ($classname != null) {
            $data = $res->fetchAll(PDO::FETCH_CLASS, $classname);
        } else {
            $data = $res->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }



}