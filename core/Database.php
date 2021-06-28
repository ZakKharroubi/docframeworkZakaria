<?php

// La classe Database permet de se connecter à la base de données. 

class Database 
{


    public static function getPdo(){

        // PENSER A CHANGER LES INFOS
        $pdo = new PDO('mysql:host=localhost;dbname=garages','garage' ,'garage', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION  ,
            PDO::ATTR_DEFAULT_FETCH_MODE  =>    PDO::FETCH_ASSOC          
          ]);

          return $pdo;

    }


}




