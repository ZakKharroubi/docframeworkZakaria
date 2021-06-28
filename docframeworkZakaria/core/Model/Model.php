<?php

namespace Model;


use PDO;


//require_once "core/database.php";

abstract class Model
{
    protected $pdo;
    protected $table;

    public function __construct(){
         $this->pdo = \Database::getPdo(); //On appelle la méthode de la classe Database, qui permet de se connecter à la BDD
    }



/**
 * trouver un élément par son id
 * renvoie un tableau contenant un élément, ou un booleen
 * si inexistant
 * 
 * @param integer $id
 * @return array|bool
 */
public function find(int $id, $className)
{

 

  $maRequete = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id =:id");

  $maRequete->execute(['id' => $id]);

  $item = $maRequete->fetchObject($className);

  return $item;

}
    /**
 * retourne un tableau contenant tous les items de 
 * la table 
 * 
 * @return array
 */
public function findAll($className) : array
{
       

        $resultat =  $this->pdo->query("SELECT * FROM {$this->table}");
        
        $items = $resultat->fetchAll(PDO::FETCH_CLASS, $className);

        return $items;

}


/**
 * supprime un item via son ID
 * @param integer $id
 * @return void
 */
public function delete(int $id) :void
{
 

  $maRequete = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id =:id");

  $maRequete->execute(['id' => $id]);


} 

}