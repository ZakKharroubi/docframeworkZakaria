<?php


// L'autoload permet de faire automatiquement le require_once d'une classe dès que son nom est appelé.


spl_autoload_register(function($nomDeClasse){


//require_once "core/Controllers/Garage.php";

$nomDeClasse = str_replace("\\", "/", $nomDeClasse);


require_once "core/$nomDeClasse.php";

//require_once "core/Controllers\Garage.php";


// Si on a des erreurs, l'autoloader va nous donner le nom de la classe qui comporte une erreur. Il faut donc bien penser à corriger à l'endroit ou on instancie la classe.

});